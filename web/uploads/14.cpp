#include "teamstyle17.h"
#include<random>

int ai_num=1;//1号AI专攻护盾+1级瞬移食用目标生物或玩家，2号2级生命+瞬移1级+5级生命,3号5级longAttack+5级生命

int tim=-1;
int longattack_target=-1;
const Map *map=NULL;
const Status *status=NULL;

int power(int x,int y)
{
	if (y==0) return 1;
	int sum=x;
	for (int i=1;i<y;++i) sum*=x;
	return sum;
};

int eat_player(int distance)
{
	if (distance==0) return -1;
	for (int i=0;i<map->objects_number;++i)
	{
		if (map->objects[i].type!=PLAYER) continue;
		if (map->objects[i].team_id==status->team_id) continue;
		if (double(map->objects[i].radius)/double(status->objects[0].radius)<kEatableRatio)
			if (Distance(map->objects[i].pos,status->objects[0].pos)<distance)
				return i;
	};
	return -1;
}

int longattack_player(int distance,int tim=10)
{
	if (distance==0) return -1;
	for (int i=0;i<map->objects_number;++i)
	{
		if (map->objects[i].type!=PLAYER) continue;
		if (map->objects[i].team_id==-2) continue;
		if (map->objects[i].team_id==status->team_id) continue;
		if (map->objects[i].shield_time>=tim) continue;
		if (Distance(map->objects[i].pos,status->objects[0].pos)<distance)
				return i;
	};
	return -1;
}

int cost(SkillType skill)
{
	if (status->objects[0].skill_level[skill]==0)
	{
		int sum=0;
		for (int i=0;i<kSkillTypes;++i) 
			if (status->objects[0].skill_level[i]!=0) ++sum;
		return power(2,sum)*kBasicSkillPrice[skill];
		
	};
	return power(2,status->objects[0].skill_level[skill])*kBasicSkillPrice[skill];
};

bool upgradeskill() 
{
	//printf("%d\n",status->objects[0].skill_level[SHIELD]);
	  
		if (status->objects[0].skill_level[LONG_ATTACK]<5)
		{
			if (status->objects[0].ability>=cost(LONG_ATTACK))
			{
				UpgradeSkill(-1,LONG_ATTACK);
				return true;
			}
		}
		
		if (status->objects[0].skill_level[HEALTH_UP]<5)
		{
			if (status->objects[0].ability>=cost(HEALTH_UP))
			{
				UpgradeSkill(-1,HEALTH_UP);
				return true;
			}
			else return false;
		}
		if (status->objects[0].skill_level[VISION_UP]<5)
		{
			if (status->objects[0].ability>=cost(VISION_UP))
			{
				UpgradeSkill(-1,VISION_UP);
				return true;
			}
			else return false;
		}
		return false;
};


bool useskill()
{
	int enemy;
	if ((status->objects[0].skill_level[LONG_ATTACK]!=0)&&(status->objects[0].skill_cd[LONG_ATTACK]==0))
	{
		enemy=longattack_player(kLongAttackRange[status->objects[0].skill_level[LONG_ATTACK]]);
		if (enemy!=-1)
		{
			longattack_target=map->objects[enemy].id;
			LongAttack(status->objects[0].id,longattack_target);
			return true;
		}
	};

	if ((status->objects[0].skill_level[LONG_ATTACK]!=0)&&(status->objects[0].skill_cd[LONG_ATTACK]==0))
	{
		enemy=longattack_player(kLongAttackRange[status->objects[0].skill_level[LONG_ATTACK]]+5*kMaxMoveSpeed,15);
		if (enemy!=-1)
		{
			Position speed;
			Position pos=map->objects[enemy].pos;
			speed.x=-100*(status->objects[0].pos.x-pos.x);
			speed.y=-100*(status->objects[0].pos.y-pos.y);
			speed.z=-100*(status->objects[0].pos.z-pos.z);
			Move(status->objects[0].id,speed);
			return true;
		}
	};


	return false;
};

int danger_move()
{
	for (int i=0;i<map->objects_number;++i)
	{
		if (map->objects[i].type!=PLAYER) continue;
		if (map->objects[i].team_id==-2) 
		{ if (Distance(map->objects[i].pos,status->objects[0].pos)>=5*kMaxMoveSpeed) continue;};
		if (map->objects[i].team_id==status->team_id) continue;
		if (Distance(map->objects[i].pos,status->objects[0].pos)<=10*kMaxMoveSpeed) 
			if (double(status->objects[0].radius)/double(map->objects[i].radius)<kMaxMoveSpeed)
			return i;
	}
	return -1;
};

bool can_eat(Position pos,double r)
{
	double r1=r,r2=kMapSize-r,r3=r*r;
	double a,b,c,d,e,f,a1,b1,c1,d1,e1,f1;
	a=(pos.x-r1)*(pos.x-r1);a1=pos.x;
	b=(pos.y-r1)*(pos.y-r1);b1=pos.y;
	c=(pos.z-r1)*(pos.z-r1);c1=pos.z;
	d=(pos.x-r2)*(pos.x-r2);d1=kMapSize-pos.x;
	e=(pos.y-r2)*(pos.y-r2);e1=kMapSize-pos.y;
	f=(pos.z-r2)*(pos.z-r2);f1=kMapSize-pos.z;
	if ((a1<r)&&(b1<r)&&(a+b>r3)) return false;
	if ((a1<r)&&(c1<r)&&(a+c>r3)) return false;
	if ((a1<r)&&(e1<r)&&(a+e>r3)) return false;
	if ((a1<r)&&(f1<r)&&(a+f>r3)) return false;
	if ((d1<r)&&(b1<r)&&(d+b>r3)) return false;
	if ((d1<r)&&(c1<r)&&(d+c>r3)) return false;
	if ((d1<r)&&(e1<r)&&(d+e>r3)) return false;
	if ((d1<r)&&(f1<r)&&(d+f>r3)) return false;
	if ((c1<r)&&(b1<r)&&(c+b>r3)) return false;
	if ((b1<r)&&(f1<r)&&(b+f>r3)) return false;
	if ((c1<r)&&(e1<r)&&(c+e>r3)) return false;
	if ((e1<r)&&(f1<r)&&(e+f>r3)) return false;

	return true;
};


int find_ENERGY()
{
	int ans_ENERGY=-1,ans_ADVANCED_ENERGY=-1,sum=0;
		double dis=10000000,r=status->objects[0].radius;
	for (int i=0;i<map->objects_number;++i)
	{
		if (map->objects[i].type==ENERGY) 
		{
			++sum;
			if (ans_ADVANCED_ENERGY!=-1) continue;
			if (!can_eat(map->objects[i].pos,r)) continue;
			double temp=Distance(map->objects[i].pos,status->objects[0].pos);
			if (temp<dis)
			{
				dis=temp;
				ans_ENERGY=i;
			};
			continue;
		};
		if (map->objects[i].type==ADVANCED_ENERGY)
		{
			//printf("AI3 find a ADVANCED_ENERGY\n");
			if (!can_eat(map->objects[i].pos,r)) continue;
			if (ans_ADVANCED_ENERGY==-1)
			{
				ans_ADVANCED_ENERGY=i;
				dis=Distance(map->objects[i].pos,status->objects[0].pos);
				continue;
			};
			double temp=Distance(map->objects[i].pos,status->objects[0].pos);
			if (temp<dis)
			{
				dis=temp;
				ans_ADVANCED_ENERGY=i;
			};
		};
	};
	printf("AI3 find %d energy\n",sum);
	printf("There are %d object\n",map->objects_number);
	if (ans_ADVANCED_ENERGY!=-1) return ans_ADVANCED_ENERGY;
	else return ans_ENERGY;
};

int find_enemy()
{
	for (int i=0;i<map->objects_number;++i)
	{
		if (map->objects[i].type!=PLAYER) continue;
		if (double(map->objects[i].radius)/double(status->objects[0].radius)<kEatableRatio) return i;
	};
	return -1;

};

int enemy_id(int id)
{
	for (int i=0;i<map->objects_number;++i)
	{
		if (map->objects[i].id!=id) continue;
		return i;
	};
};


void move()
{
	if (status->objects[0].long_attack_casting==0) longattack_target=-1;
	if (longattack_target!=-1)
	{
		int enemy=enemy_id(longattack_target);
		if (map->objects[enemy].shield_time>=status->objects[0].long_attack_casting);
		Position pos=map->objects[enemy].pos;
		if (Distance(pos,status->objects[0].pos)>=kLongAttackRange[status->objects[0].skill_level[LONG_ATTACK]]-kMaxMoveSpeed*2)
		{
			Position speed;
			speed.x=-100*(status->objects[0].pos.x-pos.x);
			speed.y=-100*(status->objects[0].pos.y-pos.y);
			speed.z=-100*(status->objects[0].pos.z-pos.z);
			Move(status->objects[0].id,speed);
			return;
		};
	};
	int danger=danger_move();
	if (danger!=-1)
	{
		Position speed;
		speed.x=100*(status->objects[0].pos.x-map->objects[danger].pos.x);
		speed.y=100*(status->objects[0].pos.y-map->objects[danger].pos.y);
		speed.z=100*(status->objects[0].pos.z-map->objects[danger].pos.z);
		Move(status->objects[0].id,speed);
		return;
	};
	int enemy=find_enemy();
	if (enemy!=-1)
	{
		Position speed;
		speed.x=-100*(status->objects[0].pos.x-map->objects[enemy].pos.x);
		speed.y=-100*(status->objects[0].pos.y-map->objects[enemy].pos.y);
		speed.z=-100*(status->objects[0].pos.z-map->objects[enemy].pos.z);
		Move(status->objects[0].id,speed);
		return;
	};
	int ENERGY=find_ENERGY();
	if (ENERGY!=-1)
	{
		Position speed;
		speed.x=-100*(status->objects[0].pos.x-map->objects[ENERGY].pos.x);
		speed.y=-100*(status->objects[0].pos.y-map->objects[ENERGY].pos.y);
		speed.z=-100*(status->objects[0].pos.z-map->objects[ENERGY].pos.z);
		Move(status->objects[0].id,speed);
		return;
	};
	Position speed;
	speed.x=-100*(status->objects[0].pos.x-(kMapSize>>1));
	speed.y=-100*(status->objects[0].pos.y-(kMapSize>>1));
	speed.z=-100*(status->objects[0].pos.z-(kMapSize>>1));
	Move(status->objects[0].id,speed);
	return;

};


void AIMain() {
	//int i = rand() % 9;
	const int now=GetTime();
	if (now==tim) return;
	else tim=now;

	map = GetMap();
	status = GetStatus();
	printf("now is %d,my speed is %lf %lf %lf\n",tim,status->objects[0].speed.x,status->objects[0].speed.y,status->objects[0].speed.z);
	printf("my position is %lf %lf %lf\n",status->objects[0].pos.x,status->objects[0].pos.y,status->objects[0].pos.z);
	if (!upgradeskill())
		if (!useskill())
			move();
	



	/*switch (i) {
	case 0:map = GetMap(); break;
	case 1:status = GetStatus(-1); break;
	case 2:LongAttack(-1, 1); break;
	case 3:ShortAttack(-1); break;
	case 4:Shield(-1); break;
	case 5:Teleport(-1, { double(rand() % kMapSize), double(rand() % kMapSize), double(rand() % kMapSize) }); break;
	case 6:UpgradeSkill(-1, SkillType(rand() % kSkillTypes)); break;
	case 7:GetTime(); break;
	default:Move(-1, { double(rand() % kMapSize), double(rand() % kMapSize), double(rand() % kMapSize) });
	}*/
}
