#include "teamstyle17.h"
#include "../communicate/basic.h"
//整理数据后存放数据的类型的声明，用于分析

//用来存放 能源，光之隧道，吞噬者 信息(对于自身的相对位置)的结构
// #define AEnergy Position
// #define Devour Position
// #define Energy Position
struct Energy
{
	Position pos;
	double dis;
};

struct AEnergy
{
	Position pos;
	double dis;
};

struct Devour
{
	Position pos;
	double dis;
};

//用来存放 boss与enemy 信息的结构
struct Boss
{
	int id;
	Position pos;		//相对位置
	double radius;
	int long_attack_casting;
	double dis;
};

struct Enemy
{
	int id;
	Position pos;		//相对位置
	double radius;
	int shield_time;
	int long_attack_casting;
	double dis;
};

//分析(AnalyzeData)用到的数据类型
enum DDistance
{
	DD_FAR,
	DD_MIDDLE,
	DD_NEAR,
	mDDistances
};			//离散化表示物体与自身的距离

enum DRHealth
{
	DRH_LARGER,
	DRH_SIMILAR,
	DRH_SMALLER,
	mDRHealths
};			//离散化表示目标与自身生命值比例

struct DMap
{
	int NumEnergy[mDDistances];		//距离远中近的energy数量
	int NumAEnergy[mDDistances];	//距离远中近的advanced_energy数量
	DDistance mDDEnemy;				//enemy与自身距离
	DRHealth mDRHEnemy;				//enemy与自身生命值比例
	bool LACEnemy;					//正在对enemy远攻蓄力
	DDistance mDDBoss;				//enemy与自身距离
	DRHealth mDRHBoss;				//enemy与自身生命值比例
	bool LACBoss;					//正在对enemy远攻蓄力

};			//离散化表示地图上各种物体的大致分布情况与状态
			//用于决策

//决策(MakeDecision)决定的自身状态，决定了本回合的行动
enum State
{
	ST_PEACE_E,		//吃energy
	ST_PEACE_A,		//吃advanced_energy
	ST_ATTACK_E,	//攻击enemy
	ST_ATTACK_B,	//攻击boss
	mStates
};

//用到的函数的声明

//一级函数
bool NewRound(void);			//判断新的回合是否开始
void ProcessingData(void);		//初步处理数据：将环境数据存进自己的数据结构中
void AnalyzeData(void);			//分析数据：将环境数据离散化，方便决策
void MakeDecision(void);		//决策：根据环境与自身决定自身本回合的状态mState
void SelectInstruction(void);	//指令选择：根据决策结果mState选择发出的指令类型
bool SkillUp(void);				//判断是否升级，若升级，发出升级指令

//二级函数
void AnalyzeDataEnergy(void);	
void AnalyzeDataAEnergy(void);	
void AnalyzeDataBoss(void);
void AnalyzeDataEnemy(void);

bool MakeDecisionAttackE(void);
bool MakeDecisionAttackB(void);
bool MakeDecisionPeaceA(void);
bool MakeDecisionPeaceE(void);

void InsPeaceE(void);
void InsPeaceA(void);
void InsAttackE(void);
void InsAttackB(void);

//三级函数
bool BetterFood( double DisNew, double DisBest );
bool PassDevour( Position RPFood );
bool Border( Position RPFood );

void MoveWithoutPurpose(void);

void EatEnemy(void);

//其他函数
Position Sum( Position vec1, Position vec2 );	//矢量的加法
double Health( double radius );					//计算生命值
int power2( int i );							//2 to the power of i

//宏定义一些参数
#define mMaxNumEnergy 500
#define mMaxNumAEnergy 50
#define mMaxNumDevour 50
#define mMaxNumBoss 1
#define mMaxNumEnemy 1

#define mDDEnergyFM 3000
#define mDDEnergyMN 1500
#define mDDAEnergyFM 4000
#define mDDAEnergyMN 3000

#define mShortAttackGoodDis 1000
#define mShortAttackDangerDis 500

const Position PosZero = {0.0,0.0,0.0};
const Position PosCenter = {kMapSize/2.0,kMapSize/2.0,kMapSize/2.0};
const double DisBest0 = kMapSize*1.0;

#define MY(x)	mStatus->objects[0].x
#define mMaxMoveSpeed ( kMaxMoveSpeed + kDashSpeed[MY(dash_time)?MY(skill_level[DASH]):0] )

int mTime=0;		//当前回合数
const Map * mMap;
const Status * mStatus;
Energy mEnergy[mMaxNumEnergy];
int mNumEnergy;
AEnergy mAEnergy[mMaxNumAEnergy];
int mNumAEnergy;
Devour mDevour[mMaxNumDevour];
int mNumDevour;
Boss mBoss[mMaxNumBoss];
int mNumBoss;
Enemy mEnemy[mMaxNumEnemy];
int mNumEnemy;

DMap mDMap;
State mState;


void AIMain()
{
	if( NewRound() )				//新的回合
	{
		mMap = GetMap();
		mStatus = GetStatus();		//获取数据
		if( !SkillUp() )			//升级技能 or not
		{
			ProcessingData();		//初步处理环境数据

			AnalyzeData();			//离散化分析数据

			MakeDecision();			//决策

			SelectInstruction();	//选择指令
		}
	}
}

//一级函数

bool NewRound(void)
{
	if( mTime != GetTime() )
	{
		mTime = GetTime();
		return true;
	}
	else
		return false;
}

#define ITS(x)	mMap->objects[i].x
void ProcessingData(void)
{
	mNumEnergy = mNumAEnergy = mNumDevour = 0;
	mNumBoss = mNumEnemy = 0;
	for( int i = 0; i < mMap->objects_number; i++ )
	{
		switch( ITS(type) )
		{
		case ENERGY:
			mEnergy[mNumEnergy].pos = Displacement( MY(pos), ITS(pos) );
			mEnergy[mNumEnergy].dis = Norm(mEnergy[mNumEnergy].pos) - MY(radius);
			mNumEnergy++;
			break;
		case ADVANCED_ENERGY:
			mAEnergy[mNumAEnergy].pos = Displacement( MY(pos), ITS(pos) );
			mAEnergy[mNumAEnergy].dis = Norm(mAEnergy[mNumAEnergy].pos) - MY(radius);
			mNumAEnergy++;
			break;
		case DEVOUR:
			mDevour[mNumDevour].pos = Displacement( MY(pos), ITS(pos) );
			mDevour[mNumDevour].dis = Norm(mDevour[mNumDevour].pos) - MY(radius);
			mNumDevour++;
			break;
		case BOSS:
			mBoss[mNumBoss].id = ITS(id);
			mBoss[mNumBoss].pos = Displacement( MY(pos), ITS(pos) );
			mBoss[mNumBoss].radius = ITS(radius);
			mBoss[mNumBoss].long_attack_casting = ITS(long_attack_casting);
			mBoss[mNumBoss].dis = Norm(mBoss[mNumBoss].pos) - MY(radius) - mBoss[mNumBoss].radius;
			mNumBoss++;
			break;
		case PLAYER:
			if( ITS(id) == MY(id) )						//除去自己队的物体
				break;
			mEnemy[mNumEnemy].id = ITS(id);
			mEnemy[mNumEnemy].pos = Displacement( MY(pos), ITS(pos) );
			mEnemy[mNumEnemy].radius = ITS(radius);
			mEnemy[mNumEnemy].shield_time = ITS(shield_time);
			mEnemy[mNumEnemy].long_attack_casting = ITS(long_attack_casting);
			mEnemy[mNumEnemy].dis = Norm(mEnemy[mNumEnemy].pos) - MY(radius) - mEnemy[mNumEnemy].radius;
			mNumEnemy++;
			break;
		}
	}
	return;
}
#undef ITS(x)

void AnalyzeData(void)
{
	AnalyzeDataEnergy();
	AnalyzeDataAEnergy();
	AnalyzeDataBoss();
	AnalyzeDataEnemy();
	return;
}

void MakeDecision(void)
{
	if( MakeDecisionAttackE() )
		mState = ST_ATTACK_E;
	else if( MakeDecisionAttackB() )
		mState = ST_ATTACK_B;
	else if( MakeDecisionPeaceA() )
		mState = ST_PEACE_A;
	else if( MakeDecisionPeaceE() )
		mState = ST_PEACE_E;
	return;
}

void SelectInstruction(void)
{
	switch( mState )
	{
	case ST_PEACE_E:
		InsPeaceE();
		break;
	case ST_PEACE_A:
		InsPeaceA();
		break;
	case ST_ATTACK_E:
		InsAttackE();
		break;
	case ST_ATTACK_B:
		InsAttackB();
		break;
	}
	return;
}

#define IF_SKILL_LEARN(x,n) if(MY(skill_level[x])==0){if(MY(ability)>=power2(n-1)*kBasicSkillPrice[x]){UpgradeSkill(MY(id),x);return true;}}else
#define IF_SKILL_UP(x,i) if(MY(skill_level[x])==i-1){if(MY(ability)>=power2(i-1)*kBasicSkillPrice[x]){UpgradeSkill(MY(id),x);return true;}}else

bool SkillUp(void)
{
	IF_SKILL_LEARN(DASH,1)
	IF_SKILL_LEARN(SHORT_ATTACK,2)
		IF_SKILL_UP(SHORT_ATTACK,2)
		IF_SKILL_UP(SHORT_ATTACK,3)
		IF_SKILL_UP(DASH,2)
		IF_SKILL_UP(DASH,3)
	IF_SKILL_LEARN(SHIELD,3)
		IF_SKILL_UP(SHORT_ATTACK,4)
		IF_SKILL_UP(SHORT_ATTACK,5)
		IF_SKILL_UP(DASH,4)
		IF_SKILL_UP(DASH,5)
	;
	return false;
}

#undef IF_SKILL_LEARN(x,n)
#undef IF_SKILL_UP(x,i)

//二级函数

//二级函数 of AnalyzeData

void AnalyzeDataEnergy(void)
{
	for( int i = 0; i < mDDistances; i++ )
		mDMap.NumEnergy[i] = 0;
	for( int i = 0; i < mNumEnergy; i++ )
	{
		if( mEnergy[i].dis > mDDEnergyFM )
			mDMap.NumEnergy[DD_FAR]++;
		else if( mEnergy[i].dis > mDDEnergyMN )
			mDMap.NumEnergy[DD_MIDDLE]++;
		else
			mDMap.NumEnergy[DD_NEAR]++;
	}
	return;
}

void AnalyzeDataAEnergy(void)
{
	for( int i = 0; i < mDDistances; i++ )
		mDMap.NumAEnergy[i] = 0;
	for( int i = 0; i < mNumAEnergy; i++ )
	{
		if( mAEnergy[i].dis > mDDAEnergyFM )
			mDMap.NumAEnergy[DD_FAR]++;
		else if( mAEnergy[i].dis > mDDAEnergyMN )
			mDMap.NumAEnergy[DD_MIDDLE]++;
		else
			mDMap.NumAEnergy[DD_NEAR]++;
	}
	return;
}

void AnalyzeDataBoss(void)
{
	if( mNumBoss == 0 )											//无boss
		return;

	if( mBoss[0].long_attack_casting != -1 )
	{
		mDMap.LACBoss = true;											//远攻蓄力中
		return;
	}
	else
		mDMap.LACBoss = false;											//无远攻蓄力

	if( mBoss[0].dis > kLongAttackRange[MY(skill_level[LONG_ATTACK])] )
		mDMap.mDDBoss = DD_FAR;									//远攻打不到
	else if( mBoss[0].dis > kShortAttackRange[MY(skill_level[SHORT_ATTACK])] )
		mDMap.mDDBoss = DD_MIDDLE;									//远攻打得到，近攻打不到
	else
		mDMap.mDDBoss = DD_NEAR;									//近攻打得到

	if( mBoss[0].radius/MY(radius) < kEatableRatio )			//		我可吃他
		mDMap.mDRHBoss = DRH_SMALLER;
	else if( MY(radius)/mBoss[0].radius < kEatableRatio )		//		他可吃我
		mDMap.mDRHBoss = DRH_LARGER;
	else
		mDMap.mDRHBoss = DRH_SIMILAR;								//暂时谁也吃不了谁

	return;
}

void AnalyzeDataEnemy(void)
{
	if( mNumEnemy == 0 )											//无enemy
		return;

	if( mEnemy[0].long_attack_casting != -1 )
	{
		mDMap.LACEnemy = true;											//远攻蓄力中
		return;
	}
	else
		mDMap.LACEnemy = false;											//无远攻蓄力

	if( mEnemy[0].dis > kLongAttackRange[MY(skill_level[LONG_ATTACK])] )
		mDMap.mDDEnemy = DD_FAR;									//远攻打不到
	else if( mEnemy[0].dis > kShortAttackRange[MY(skill_level[SHORT_ATTACK])] )
		mDMap.mDDEnemy = DD_MIDDLE;									//远攻打得到，近攻打不到
	else
		mDMap.mDDEnemy = DD_NEAR;									//近攻打得到

	if( mEnemy[0].radius/MY(radius) < kEatableRatio )			//		我可吃他
		mDMap.mDRHEnemy = DRH_SMALLER;
	else if( MY(radius)/mEnemy[0].radius < kEatableRatio )		//		他可吃我
		mDMap.mDRHEnemy = DRH_LARGER;
	else
		mDMap.mDRHEnemy = DRH_SIMILAR;								//暂时谁也吃不了谁

	return;
}

//二级函数 of MakeDecision
bool MakeDecisionAttackE(void)					//决定是否进攻敌人
{
	if( mNumEnemy == 0 )
		return false;
	if(MY(skill_level[SHORT_ATTACK])!=0)
		return true;
	else
		return false;
}

bool MakeDecisionAttackB(void)
{
	if( mNumBoss == 0 )
		return false;
	else if(MY(skill_level[SHORT_ATTACK])!=0)
		return true;
	else
		return false;
}

bool MakeDecisionPeaceA(void)
{
	if( mDMap.NumAEnergy[DD_NEAR] > 0 || (mDMap.NumEnergy[DD_NEAR] < 20 && mDMap.NumAEnergy[DD_MIDDLE] > 0) )
		return true;
	else
		return false;
}

bool MakeDecisionPeaceE(void)
{
	return true;
}

//二级函数 of SelectInstruction

void InsPeaceE( void )
{
	double DisBest = DisBest0;
	Position PosBest;
	bool bChange = false;	//记录PosBest是否改变
	for( int i = 0; i < mNumEnergy; i++ )
		if( BetterFood(mEnergy[i].dis,DisBest) && PassDevour(mEnergy[i].pos) && Border(mEnergy[i].pos) )
			{
				DisBest = mEnergy[i].dis;
				PosBest = mEnergy[i].pos;
				bChange = true;
			}

	if( bChange )
	{
		Move( MY(id), Scale( mMaxMoveSpeed/Norm(PosBest), PosBest ) );
	}
	else
	{
		MoveWithoutPurpose();		//无目的行走
	}
	return;
}

void InsPeaceA( void )
{
	double DisBest = DisBest0;
	Position PosBest;
	bool bChange = false;	//记录PosBest是否改变
	for( int i = 0; i < mNumAEnergy; i++ )
		if( BetterFood(mAEnergy[i].dis,DisBest) && PassDevour(mAEnergy[i].pos) && Border(mAEnergy[i].pos) )
			{
				DisBest = mAEnergy[i].dis;
				PosBest = mAEnergy[i].pos;
				bChange = true;
			}

	if( bChange )
	{
		Move( MY(id), Scale( mMaxMoveSpeed/Norm(PosBest), PosBest ) );
	}
	else
		InsPeaceE();
	return;
}

void InsAttackE(void)
{
	if( mDMap.mDDEnemy == DD_NEAR )
	{
		if( MY(skill_cd[SHORT_ATTACK]) == 0 )
		{
			if( mEnemy[0].shield_time == 0 || MY(skill_level[SHORT_ATTACK]) >= 3 )
			{
				ShortAttack( MY(id) );
				return;
			}
		}
		if( MY(shield_time) == 0 )
		{
			if( MY(skill_cd[SHIELD]) == 0 )
			{
				Shield( MY(id) );
				return;
			}
		}
		if( mDMap.mDRHEnemy == DRH_SMALLER )
		{
			if( MY(skill_level[DASH]) != 0 && MY(skill_cd[DASH]) == 0 )
			{
				Dash( MY(id) );
				return;
			}
			Move( MY(id), Scale( mMaxMoveSpeed/Norm(mEnemy[0].pos), mEnemy[0].pos ) );
			return;
		}
		else if( mDMap.mDRHEnemy == DRH_SIMILAR )
		{
			if( mEnemy[0].dis > mShortAttackGoodDis )
			{
				Move( MY(id), Scale( mMaxMoveSpeed/Norm(mEnemy[0].pos), mEnemy[0].pos ) );
				return;
			}
			else if( mEnemy[0].dis < mShortAttackDangerDis )
			{
				Move( MY(id), Scale( -mMaxMoveSpeed/Norm(mEnemy[0].pos), mEnemy[0].pos ) );
				return;
			}
			else
				return;
		}
		else//( mDMap.mDRHEnemy == DRH_LARGER )
		{
			if( mEnemy[0].dis > mShortAttackGoodDis )
			{
				Move( MY(id), Scale( mMaxMoveSpeed/Norm(mEnemy[0].pos), mEnemy[0].pos ) );
				return;
			}
			else
			{
				Move( MY(id), Scale( -mMaxMoveSpeed/Norm(mEnemy[0].pos), mEnemy[0].pos ) );
				return;
			}
		}
	}
	else															//近攻打不到的距离
	{
		if( MY(skill_level[DASH]) != 0 && MY(skill_cd[DASH]) == 0 )
		{
			Dash( MY(id) );
			return;
		}
		if( MY(shield_time) == 0 )
		{
			if( MY(skill_cd[SHIELD]) == 0 )
			{
				Shield( MY(id) );
				return;
			}
		}
		Move( MY(id), Scale( mMaxMoveSpeed/Norm(mEnemy[0].pos), mEnemy[0].pos ) );
		return;
	}
}


void InsAttackB(void)
{
	if( mDMap.mDDBoss == DD_NEAR )
	{
		if( MY(skill_cd[SHORT_ATTACK]) == 0 )
		{
			ShortAttack( MY(id) );
			return;
		}
		if( mDMap.mDRHBoss == DRH_SMALLER )
		{
			if( MY(skill_level[DASH]) != 0 && MY(skill_cd[DASH]) == 0 )
			{
				Dash( MY(id) );
				return;
			}
			Move( MY(id), Scale( mMaxMoveSpeed/Norm(mBoss[0].pos), mBoss[0].pos ) );
			return;
		}
		else
		{
			if( mBoss[0].dis > mShortAttackGoodDis )
			{
				Move( MY(id), Scale( mMaxMoveSpeed/Norm(mBoss[0].pos), mBoss[0].pos ) );
				return;
			}
			else
			{
				Move( MY(id), Scale( -mMaxMoveSpeed/Norm(mBoss[0].pos), mBoss[0].pos ) );
				return;
			}
		}
	}
	else															//近攻打不到的距离
	{
		if( MY(skill_level[DASH]) != 0 && MY(skill_cd[DASH]) == 0 )
		{
			Dash( MY(id) );
			return;
		}
		Move( MY(id), Scale( mMaxMoveSpeed/Norm(mBoss[0].pos), mBoss[0].pos ) );
		return;
	}
}


//三级函数

//三级函数 of InsPeace

bool BetterFood( double DisNew, double DisBest )
{
	if( DisNew < DisBest )
		return true;
	else
		return false;
}

bool PassDevour( Position RPFood )
{
	for( int i = 0; i < mNumDevour; i++ )
		if( PointLineDistance(mDevour[i].pos, RPFood, PosZero) <= MY(radius) )
			return false;
	return true;
}

bool Border( Position RPFood )
{
	Position APFood = Sum( MY(pos), RPFood );
	if( (APFood.x > MY(radius)*2.0 + mMaxMoveSpeed) && (APFood.x < kMapSize - MY(radius)*2.0 - mMaxMoveSpeed) ) 
		if( (APFood.y > MY(radius)*2.0 + mMaxMoveSpeed) && (APFood.y < kMapSize - MY(radius)*2.0 - mMaxMoveSpeed) ) 
			if( (APFood.z > MY(radius)*2.0 + mMaxMoveSpeed) && (APFood.z < kMapSize - MY(radius)*2.0 - mMaxMoveSpeed) )
				return true;
	return false;
}

//三级函数 of InsPeaceE

void MoveWithoutPurpose(void)
{
	Move( MY(id), Scale( mMaxMoveSpeed/Distance(MY(pos),PosCenter), Displacement(MY(pos),PosCenter) ) );
		//////////////////////需要改！！！！！！！！！！！！！！
	return;
}


//三级函数 of InsAttackE

void EatEnemy(void)								//过去吃对手
{
	if( mDMap.mDRHEnemy == DRH_SMALLER )
	{
		if( MY(skill_cd[SHIELD]) == 0 )
		{
			Shield(MY(id));
			return;
		}
		else if( MY(skill_cd[DASH]) == 0 )
		{
			Dash(MY(id));
			return;
		}
		else
		{
			Move( MY(id), mEnemy[0].pos );
			return;
		}
	}
	else if( (MY(long_attack_casting) != 0) && (MY(long_attack_casting) != -1) )
	{
		Move( MY(id), mEnemy[0].pos );
		return;
	}
	else
		InsPeaceA();
	return;
}

//其他函数

Position Sum( Position vec1, Position vec2 )
{
	Position vec3 ={vec1.x + vec2.x, vec1.y + vec2.y, vec1.z + vec2.z};
	return vec3;
}

double Health( double radius )
{
	return (radius/100.0)*(radius/100.0)*(radius/100.0);
}

int power2( int i )
{
	int x=1;
	for( int j = 0; j < i; ++j )
		x *= 2;
	return x;
}