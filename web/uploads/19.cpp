#include "teamstyle17.h"
#include <stdio.h>
#include <stdlib.h>
#include <time.h>
#include <math.h>

const double eps = 1e-6;

static PlayerObject me[kMaxPlayerObjectNumber];
static Object opponent[kMaxPlayerObjectNumber];
static Object boss;
static int me_number;
static int opponent_number;
static int devour_number;
static int see_boss;

const Map *map;

void init();
void Stragegy();
int border_status(double);
void moveto(PlayerObject, Position);
void movetowards(PlayerObject, Position);
int cost(PlayerObject, SkillType);
void upgrade(PlayerObject, SkillType);
void long_attack(PlayerObject, Object);
void short_attack(PlayerObject);
void shield(PlayerObject);
void dash(PlayerObject);

typedef Position Vector;
double dist(Position, Position);
double length(Vector);
double dot_product(Vector, Vector);
double ABS(double);
double SQR(double);
double POW(double, int);

static int current_time;
static int border;
static int boss_warning;
static double boss_r = (double)2000;
static Vector speed;
static Position last_pos;
static int AE_Parameter=15;

void AIMain() 
{
    //if (GetStatus() -> team_id) return;
	register int i;
	srand(time(0));
	for(;;)
	{
		init();
		//if (GetStatus() -> team_id == 1) 
			//printf("%d %lf %lf\n", GetTime(), dot_product(speed, me[i].speed) / (length(speed) * length(me[i].speed)), length(speed));
		for (i = 0; i < me_number; ++i)
		{
			register Position des;
			des.x = me[i].pos.x + speed.x;
			des.y = me[i].pos.y + speed.y;
			des.z = me[i].pos.z + speed.z;

			if (dist(last_pos, me[i].pos) < eps) 
				des.x = des.y = des.z = 0.5 * kMapSize;
			if (dist(last_pos, des) < eps) 
				des.x = des.y = des.z = rand() % rand() % kMapSize;
			movetowards(me[i], des);
			last_pos = me[i].pos;
		}
		Stragegy();
	}
}

void init(){
	map = GetMap();
	current_time = map -> time;
	
	register int i,j;
	register int cnt;
	me_number = GetStatus() -> objects_number;
	for (i = 0; i < me_number; ++i) me[i] = GetStatus() -> objects[i];
	opponent_number = devour_number = see_boss = 0;
	speed.x = speed.y = speed.z = (double)0;

	if (!border) 
		border = border_status(1.1 * me[0].radius);
	if (border) 
		border = border_status(2 * me[0].radius);


	for (i = 0; i < map -> objects_number; ++i){
		register double F = (double)0, dis = dist(map -> objects[i].pos, me[0].pos);
		for (j = 0; i < kSkillTypes; ++j)
			if (me[i].skill_level[j]) ++cnt;
		if (cnt>=3)
			AE_Parameter=4;
		else
			AE_Parameter=15;
		switch (map -> objects[i].type){
			case PLAYER:
				if (map -> objects[i].team_id == GetStatus() -> team_id) break;
				opponent[opponent_number++] = map -> objects[i];
				if (me[0].radius < map -> objects[i].radius) 
					F = -10 * POW(me[0].radius, 2) / POW(dis, 3);
				if (me[0].radius > map -> objects[i].radius) 
					F = 30 * POW(me[0].radius, 2) / POW(dis, 3);
				break;
			case ENERGY:
				F = 5 * POW(me[0].radius, 2) / POW(dis, 3);
				break;
			case ADVANCED_ENERGY:
				if (dis < 0.95 * me[0].radius) break;
				F = AE_Parameter * POW(me[0].radius, 2) / POW(dis, 3);
				break;
			case DEVOUR:
				F = -5 * POW(me[0].radius, 2) / POW(dis, 3);
				if (dis < 1.5 * me[0].radius) F *= 1e3;
				break;
			case BOSS:
				boss = map -> objects[i];
				see_boss = 1;
				boss_r = boss.radius;
				if (!boss_warning) boss_warning = (int)(dis < 1.5 * boss_r);
				if (boss_warning) boss_warning = (int)(dis < 5 * boss_r);
				if (boss_r < me[0].radius) boss_warning = 0;
				if (boss_warning) F = -7 * me[0].radius * boss_r / POW(dis, 3);
				break;
			default:
				break;
		}
		//if (GetStatus() -> team_id) printf("%d\t%lf\n", map -> objects[i].type, F);
		speed.x += 1e3 * F * (map -> objects[i].pos.x - me[0].pos.x);
		speed.y += 1e3 * F * (map -> objects[i].pos.y - me[0].pos.y);
		speed.z += 1e3 * F * (map -> objects[i].pos.z - me[0].pos.z);
	}
	if (boss_r < me[0].radius)
	{
		speed.x += 2 * (0.5 * kMapSize - me[0].pos.x);
		speed.y += 2 * (0.5 * kMapSize - me[0].pos.y);
		speed.z += 2 * (0.5 * kMapSize - me[0].pos.z);
	}
	speed.x *= 100 + rand() % 10;
	speed.y *= 100 + rand() % 10;
	speed.z *= 100 + rand() % 10;
}
void Stragegy()
{
	if (opponent_number)
		if (!opponent[0].shield_time)
		{
			if (dist(me[0].pos, opponent[0].pos) - me[0].radius - opponent[0].radius < kShortAttackRange[me[0].skill_level[SHORT_ATTACK]])
				short_attack(me[0]);
			if (dist(me[0].pos, opponent[0].pos) - me[0].radius - opponent[0].radius < kLongAttackRange[me[0].skill_level[LONG_ATTACK]]) 
				long_attack(me[0], opponent[0]);
		}
		else 
			shield(me[0]);
	upgrade(me[0], HEALTH_UP);
	upgrade(me[0], SHORT_ATTACK);
	if (me[0].skill_level[SHORT_ATTACK] >= me[0].skill_level[LONG_ATTACK])
		upgrade(me[0],LONG_ATTACK);
	if (me[0].skill_level[LONG_ATTACK] >= me[0].skill_level[VISION_UP]) 
	{
		printf("vision_up!\n");
		upgrade(me[0], VISION_UP);
	}
	//upgrade(me[0],SHIELD);	
}
int border_status(double r)
{
	register int flag = 0;
	if (me[0].pos.x < r) speed.x += 5e8, flag = 1;
	if (me[0].pos.x > kMapSize - r) speed.x -= 5e8, flag = 1;
	if (me[0].pos.y < r) speed.y += 5e8, flag = 1;
	if (me[0].pos.y > kMapSize - r) speed.y -= 5e8, flag = 1;
	if (me[0].pos.z < r) speed.z += 5e8, flag = 1;
	if (me[0].pos.z > kMapSize - r) speed.z -= 5e8, flag = 1;
	return flag;
}

void moveto(PlayerObject obj, Position des)
{
	if (dist(obj.pos, des) < eps) return;
	register Position vec;
	vec.x = des.x - obj.pos.x;
	vec.y = des.y - obj.pos.y;
	vec.z = des.z - obj.pos.z;
	Move(obj.id, vec);
}

void movetowards(PlayerObject obj, Position des)
{
	if (dist(obj.pos, des) < eps) return;
	register Position vec;
	vec.x = des.x - obj.pos.x;
	vec.y = des.y - obj.pos.y;
	vec.z = des.z - obj.pos.z;
	register double len = length(vec);
	vec.x *= (kMaxMoveSpeed + kDashSpeed[obj.skill_level[DASH]]) / len;
	vec.y *= (kMaxMoveSpeed + kDashSpeed[obj.skill_level[DASH]]) / len;
	vec.z *= (kMaxMoveSpeed + kDashSpeed[obj.skill_level[DASH]]) / len;
	Move(obj.id, vec);
}

int cost(PlayerObject obj, SkillType skill)
{
	if (obj.skill_level[skill]) 
		return kBasicSkillPrice[skill] << obj.skill_level[skill];
	register int i, cnt = 0;
	for (i = 0; i < kSkillTypes; ++i)
		if (obj.skill_level[i]) ++cnt;
	return kBasicSkillPrice[skill] << cnt;
}

void upgrade(PlayerObject obj, SkillType skill)
{
	if (obj.skill_level[skill] == 5) return;
	if (obj.ability < cost(obj, skill)) return;
	UpgradeSkill(obj.id, skill);
}

void long_attack(PlayerObject obj, Object target){
	if (!obj.skill_level[LONG_ATTACK]) return;
	if (obj.skill_cd[LONG_ATTACK]) return;
	if (dist(obj.pos, target.pos) - obj.radius - target.radius > kLongAttackRange[obj.skill_level[LONG_ATTACK]]) return;
	LongAttack(obj.id, target.id);
}

void short_attack(PlayerObject obj)
{
	if (!obj.skill_level[SHORT_ATTACK]) return;
	if (obj.skill_cd[SHORT_ATTACK]) return;
	ShortAttack(obj.id);
}

void shield(PlayerObject obj){
	if (!obj.skill_level[SHIELD]) return;
	if (obj.skill_cd[SHIELD]) return;
	Shield(obj.id);
}

void dash(PlayerObject obj)
{
	if (!obj.skill_level[DASH]) return;
	if (obj.skill_cd[DASH]) return;
	Dash(obj.id);
}

double dist(Position src, Position des)
{
	register Position vec;
	vec.x = des.x - src.x;
	vec.y = des.y - src.y;
	vec.z = des.z - src.z;
	return length(vec);
}

double length(Vector vec)
{
	return sqrt(dot_product(vec, vec));
}

double dot_product(Vector vec1, Vector vec2)
{
	return vec1.x * vec2.x + vec1.y * vec2.y + vec1.z * vec2.z;
}

double ABS(double x)
{
	return x > 0 ? x : -x;
}

double SQR(double x)
{
	return x * x;
}

double POW(double x, int a)
{
	if (ABS(x) < eps) x = 0.1;
	register double res = (double)1;
	for (; a; a >>= 1, x = SQR(x))
		if (a & 1) res *= x;
	return res;
}

