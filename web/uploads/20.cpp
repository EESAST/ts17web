#include "teamstyle17.h"
#include"stdlib.h"
#include<iostream>
#include<cmath>
using namespace std;
//此AI为主动进攻型近战式AI，具体策略为：
//升级技能部分：优先升级满级近程攻击，前期提升两次生命，再点加速，后期生命值加满（已写完）
//吃货部分：生命值技能加满前优先吃光之隧道；生命值加满后优先吃能量源，光之隧道看脸（已完成）
//搜索与攻击部分：学习攻击后被调用，检测视野内是否有敌人，若有蓄力单位，用满级近程攻击保护自己，否则开启加速进行主动攻击（已完成）
//防守BOSS部分：防守BOSS不被敌人吃掉（未完成）
//躲避部分：防止前期血少时直接冲向BOSS（未完成）
int  upgradeskill(int user_id,int sp,int learnednum,int atklevel,int hplevel,int dashlevel)
{
	cout<<"进入升级技能函数"<<endl;
	if((sp>=pow(2,atklevel)&&atklevel>0&&atklevel<5)||(atklevel==0&&sp>=pow(2,learnednum)))
	{
			UpgradeSkill(user_id,SHORT_ATTACK);	//升级近程攻击至5级
			return 0;//如果升级了技能,返回零告诉其他指令不要执行了
	}
	if((sp>=pow(2,hplevel)&&hplevel>0&&hplevel<2)||(hplevel==0&&sp>=2))
	{
			UpgradeSkill(user_id,HEALTH_UP);//先升级加血2级
			return 0;//如果升级了技能,返回零告诉其他指令不要执行了
	}	
	if(hplevel>=2)
	{
		if((sp>=pow(2,dashlevel)&&dashlevel>0&&dashlevel<5)||(dashlevel==0&&sp>=pow(2,learnednum)))
		{
			UpgradeSkill(user_id,DASH);//升级加速至5级
			return 0;//如果升级了技能,返回零告诉其他指令不要执行了
		}	
	}
	if(atklevel==5&&dashlevel)
	{
		if(sp>=pow(2,hplevel)&&hplevel<5)
		{
			UpgradeSkill(user_id,HEALTH_UP);//升级加血至5级
			return 0;//如果升级了技能,返回零告诉其他指令不要执行了
		}	
	}
	cout<<"没有升级技能"<<endl;
	return 1;//如果没进行技能升级,其他函数可以执行指令
}
int search(int user_id,int user_teamid,double radius,Position user_pos,int atklevel,int atkcd,int dashlevel,int dashcd)
{
	cout<<"进入了查找函数"<<endl;
	int i=0,objectnum=0,rivalshieldtime=0,teamid=-1,rival_atk=0;
	double rival_radius,dis=200000;//与对手距离
	Position rival_pos;//对手位置
	const Map *map=NULL;
	map=GetMap();//获得地图信息	
	objectnum=map->objects_number;//获得视野内单位数
	for(i=0;i<objectnum;i++)
	{
		teamid=map->objects[i].team_id;
		if(((map->objects[i].type)==PLAYER)&&(user_teamid!=teamid))
		{
			rival_pos=map->objects[i].pos;//获得对手位置
			rival_radius=map->objects[i].radius;//获得对手半径
			rivalshieldtime=map->objects[i].shield_time;//获得对手护盾剩余时间
			rival_atk=map->objects[i].long_attack_casting;//获得对手蓄力时间
			dis=Distance(user_pos,rival_pos);//计算双方距离
			if((rival_atk!=-1)&&atkcd==0&&atklevel==5)//敌人蓄力
			{
				 ShortAttack(user_id);//利用5级近程攻击特效保护自己
				 cout<<"不可见护盾"<<endl;
				 return 0;
			}
			if(dis<((1400+300*(atklevel-1))+rival_radius+radius)&&atkcd==0&&dashlevel==0)//敌人进入攻击范围,还击不追击
			{
				 ShortAttack(user_id);
				 cout<<"攻击对手"<<endl;
				 return 0;
			}
			if(dashlevel)//学习了加速
			{
				if(dashcd==0)//加速CD为0
				{
					Dash(user_id);
					cout<<"开启加速"<<endl;
					return 0;
				}
				else if(dis<((1200+300*(atklevel-1))+rival_radius+radius)&&atkcd==0)//敌人进入攻击范围
				{
					 ShortAttack(user_id);
					 cout<<"攻击对手"<<endl;
					 return 0;
				}
				   	 else if(radius>rival_radius)
					 {
						 Position des={rival_pos.x-user_pos.x,rival_pos.y-user_pos.y,rival_pos.z-user_pos.z};
						 Move(user_id,des);//加速追击
						 cout<<"向敌人移动"<<endl;
						 return 0;
					 }
			}
		}
	}
	cout<<"射程内无单位"<<endl;
	return 1;
}
void eat(int user_id,Position user_pos,double radius,int atklevel,int dashlevel)
{
	cout<<"吃吃吃"<<endl;
	int i,eati=0,eatj=0,objectnum=0,energynum=0,lightnum=0;
	double dis1=200000,dis2=200000,min1=200000,min2=200000,x=0,y=0,z=0;
	Position energy_pos,light_pos;
	const Map *map=NULL;
	map=GetMap();//获得地图信息	
	objectnum=map->objects_number;//获得视野内单位数
	for(i=0;i<objectnum;i++)
	{
		if((map->objects[i].type)==ENERGY) 
		{
			energy_pos=map->objects[i].pos;//获得能量源位置
			if(energy_pos.x+radius<20000&&energy_pos.x-radius>0&&energy_pos.y+radius<20000&&energy_pos.y-radius>0&&energy_pos.z+radius<20000&&energy_pos.z-radius>0)//防止卡在边缘
			{
				energynum++;//视野内有效能量源数目
				dis1=Distance(user_pos,energy_pos);//记录与能量源的距离
				if(dis1<min1) 
				{
					min1=dis1;eati=i;//记录最近的能量源的位置
				}
			}
		}
		if((map->objects[i].type)==ADVANCED_ENERGY) 
		{
			light_pos=map->objects[i].pos;//获得光之隧道位置
			if(light_pos.x+radius<20000&&light_pos.x-radius>0&&light_pos.y+radius<20000&&light_pos.y-radius>0&&light_pos.z+radius<20000&&light_pos.z-radius>0)//防止卡在边缘
			{	
				lightnum++;//视野内有效光之隧道数目
				dis2=Distance(user_pos,light_pos);//计算与光之隧道的距离
				if(dis2<min2) 
				{
					min2=dis2;eatj=i;//记录最近的光之隧道的位置
				}
			}
		}
	}	
	cout<<"有效能量源"<<energynum<<endl;
	cout<<"有效光之隧道"<<lightnum<<endl;
	if(dashlevel<5)
	{	
		if(lightnum)//在能量源与光之隧道之间进行选择 
		{
			light_pos=map->objects[eatj].pos;
			x=light_pos.x-user_pos.x;y=light_pos.y-user_pos.y;z=light_pos.z-user_pos.z;
			cout<<"最小距离"<<dis2<<endl;
		}
		else
		{
			energy_pos=map->objects[eati].pos;
			x=energy_pos.x-user_pos.x;y=energy_pos.y-user_pos.y;z=energy_pos.z-user_pos.z;
			cout<<"最小距离"<<dis1<<endl;
		}
	}
	else
		{
			energy_pos=map->objects[eati].pos;
			x=energy_pos.x-user_pos.x;y=energy_pos.y-user_pos.y;z=energy_pos.z-user_pos.z;
			cout<<"最小距离"<<dis1<<endl;
		}
	Position des={x,y,z};	
	Move(user_id, des);//向最近的能量源或光之隧道移动
}
void AIMain() 
{
	double health,radius;
	const Status *status = NULL;
	int user_id,user_teamid=0,sp=0,flag=0,atkcd=0,dashlevel=0,dashcd=0,atklevel=0,hplevel=0,learnednum=0;
	Position user_pos;
	status=GetStatus();//获得自身信息
	user_id=status->objects[0].id;//获得自身ID
	user_teamid=status->team_id;
	user_pos=status->objects[0].pos;//获得自身位置
	health=status->objects[0].health;//获得HP
	radius=status->objects[0].radius;//获得自身半径
	sp=status->objects[0].ability;//获得技能点
	hplevel=status->objects[0].skill_level[HEALTH_UP];//获得生命值提升技能等级
	atklevel=status->objects[0].skill_level[SHORT_ATTACK];//获得近程攻击技能等级
	atkcd=status->objects[0].skill_cd[SHORT_ATTACK];//获得近程攻击CD
	dashlevel=status->objects[0].skill_level[DASH];//获得加速技能等级
	dashcd=status->objects[0].skill_cd[DASH];//获得加速CD
	if(atklevel) learnednum++;
	if(hplevel) learnednum++;
	if(dashlevel) learnednum++;
	cout<<"学了"<<learnednum<<"个技能"<<endl;
	if(upgradeskill(user_id,sp,learnednum,atklevel,hplevel,dashlevel))//升级技能函数
	{
		if(atklevel)
		{
			if(search(user_id,user_teamid,radius,user_pos,atklevel,atkcd,dashlevel,dashcd))//查找对手
				eat(user_id,user_pos,radius,atklevel,dashlevel);//吃货函数
		}
		else
		{
			eat(user_id,user_pos,radius,atklevel,dashlevel);//吃货函数
		}
	}
	cout<<"---------------------------------------------------------------"<<endl;
}