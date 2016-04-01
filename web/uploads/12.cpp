#include "teamstyle17.h"
#include<random>

int ai_num = 1;//1号AI专攻护盾+1级瞬移食用目标生物或玩家，2号专攻远程攻击

int time_v;
const Map *map = NULL;
const Status *status = NULL;

int power(int x, int y)
{
    if (y == 0) return 1;
    int sum = x;
    for (int i = 1;i<y;++i) sum *= x;
    return sum;
};

/*int eat_player(int distance)
{
for (int i=0;i<map->objects_number;++i)
{
if (map->objects[i].type!=PLAYER) continue;
if (map->objects[i].team_id==status->team_id) continue;
if (double(map->objects[i].radius)/double(status->objects[0].r)<kEatableRatio)
if (Distance(map->objects[i].pos,status->objects[0].pos)<distance)
return i;
};
return -1;
}*/

int cost(SkillType skill)
{
    if (status->objects[0].skill_level[skill] == 0)
    {
        int sum = 0;
        for (int i = 0;i<kSkillTypes;++i)
            if (status->objects[0].skill_level[i] != 0) ++sum;
        return power(2, sum)*kBasicSkillPrice[skill];

    };
    return power(2, status->objects[0].skill_level[skill])*kBasicSkillPrice[skill];
};

bool upgradeskill()
{
    //printf("%d\n",status->objects[0].skill_level[SHIELD]);
    /* if ((eat_player(kTeleportMaxDistance[1])!=-1)&&(status->objects[0].skill_level[TELEPORT]==0))
    {
    if (status->objects[0].ability>=cost(TELEPORT))
    {
    UpgradeSkill(-1,TELEPORT);
    return true;
    };
    }*/
    if (status->objects[0].skill_level[SHIELD]<5)
    {
        //printf("%d %d\n",cost(SHIELD),status->objects[0].ability);
        if (status->objects[0].ability >= cost(SHIELD))
        {
            UpgradeSkill(-1, SHIELD);
            return true;
        }
        else return false;
    }
    /*if (status->objects[0].skill_level[TELEPORT]<5)
    {
    if (status->objects[0].ability>=cost(TELEPORT))
    {
    UpgradeSkill(-1,TELEPORT);
    return true;
    }
    else return false;
    }*/
    if (status->objects[0].skill_level[HEALTH_UP]<5)
    {
        if (status->objects[0].ability >= cost(HEALTH_UP))
        {
            UpgradeSkill(-1, HEALTH_UP);
            return true;
        }
        else return false;
    }
    if (status->objects[0].skill_level[VISION_UP]<5)
    {
        if (status->objects[0].ability >= cost(VISION_UP))
        {
            UpgradeSkill(-1, VISION_UP);
            return true;
        }
        else return false;
    }
    return false;
};

bool danger_shield()
{
    for (int i = 0;i<map->objects_number;++i)
    {
        if (map->objects[i].type != PLAYER) continue;
        if (map->objects[i].team_id == -2) continue;
        if (map->objects[i].team_id == status->team_id) continue;
        if (map->objects[i].long_attack_casting>-1) return true;
        if (Distance(map->objects[i].pos, status->objects[0].pos)<kShortAttackRange[3]) return true;
    };
    return false;
};
bool useskill()
{
    if (status->objects[0].skill_level[SHIELD] != 0)
        if (danger_shield())
        {
            Shield(-1);
            return true;
        };
    /*int enemy=eat_player(kTeleportMaxDistance[status->objects[0].skill_level[TELEPORT]]);
    if (enemy!=-1)
    {
    if (status->objects[0].skill_level[TELEPORT]!=0)
    {
    Teleport(status->objects[0].id,map->objects[enemy].pos);
    return true;
    };
    };*/
    return false;
};

int danger_move()
{
    for (int i = 0;i<map->objects_number;++i)
    {
        if (map->objects[i].type != PLAYER) continue;
        if (map->objects[i].team_id == -2)
        {
            if (Distance(map->objects[i].pos, status->objects[0].pos) >= 5 * kMaxMoveSpeed) continue;
        };
        if (map->objects[i].team_id == status->team_id) continue;
        if (Distance(map->objects[i].pos, status->objects[0].pos) <= 10 * kMaxMoveSpeed)
            if (double(status->objects[0].radius) / double(map->objects[i].radius)<kEatableRatio)
                return i;
    }
    return -1;
};

int find_ENERGY()
{
    int ans_ENERGY = -1, ans_ADVANCED_ENERGY = -1, dis = 10000000;
    for (int i = 0;i<map->objects_number;++i)
    {
        if (map->objects[i].type == ENERGY)
        {
            if (ans_ADVANCED_ENERGY != -1) continue;
            int temp = Distance(map->objects[i].pos, status->objects[0].pos);
            if (temp<dis)
            {
                dis = temp;
                ans_ENERGY = i;
            };
            continue;
        };
        if (map->objects[i].type == ADVANCED_ENERGY)
        {
            printf("AI1 find a ADVANCED_ENERGY\n");
            if (ans_ADVANCED_ENERGY == -1)
            {
                ans_ADVANCED_ENERGY = i;
                dis = Distance(map->objects[i].pos, status->objects[0].pos);
                continue;
            };
            int temp = Distance(map->objects[i].pos, status->objects[0].pos);
            if (temp<dis)
            {
                dis = temp;
                ans_ADVANCED_ENERGY = i;
            };
        };
    };
    if (ans_ADVANCED_ENERGY != -1) return ans_ADVANCED_ENERGY;
    else return ans_ENERGY;
};


int find_enemy()
{
    for (int i = 0;i<map->objects_number;++i)
    {
        if (map->objects[i].type != PLAYER) continue;
        if (double(map->objects[i].radius) / double(status->objects[0].radius)<kEatableRatio) return i;
    };
    return -1;

};


void move()
{
    int danger = danger_move();
    if (danger != -1)
    {
        Position speed;
        speed.x = 100 * (status->objects[0].pos.x - map->objects[danger].pos.x);
        speed.y = 100 * (status->objects[0].pos.y - map->objects[danger].pos.y);
        speed.z = 100 * (status->objects[0].pos.z - map->objects[danger].pos.z);
        Move(status->objects[0].id, speed);
        return;
    };
    int enemy = find_enemy();
    if (enemy != -1)
    {
        Position speed;
        speed.x = -100 * (status->objects[0].pos.x - map->objects[enemy].pos.x);
        speed.y = -100 * (status->objects[0].pos.y - map->objects[enemy].pos.y);
        speed.z = -100 * (status->objects[0].pos.z - map->objects[enemy].pos.z);
        Move(status->objects[0].id, speed);
        return;
    };
    int ENERGY = find_ENERGY();
    if (ENERGY != -1)
    {
        Position speed;
        speed.x = -100 * (status->objects[0].pos.x - map->objects[ENERGY].pos.x);
        speed.y = -100 * (status->objects[0].pos.y - map->objects[ENERGY].pos.y);
        speed.z = -100 * (status->objects[0].pos.z - map->objects[ENERGY].pos.z);
        Move(status->objects[0].id, speed);
        return;
    };
    Position speed;
    speed.x = -100 * (status->objects[0].pos.x - (kMapSize >> 1));
    speed.y = -100 * (status->objects[0].pos.y - (kMapSize >> 1));
    speed.z = -100 * (status->objects[0].pos.z - (kMapSize >> 1));
    Move(status->objects[0].id, speed);
    return;

};


void AIMain() {
    //int i = rand() % 9;
    
    const int now = GetTime();
    if (now == time_v) return;
    else time_v = now;
    map = GetMap();
    status = GetStatus();
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

