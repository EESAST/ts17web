//
//  main.cpp
//  Q.M. Algorithm
//
//  Created by Lin,Tzu-Heng on 3/4/16.
//  Copyright © 2016 Lin, Tzu-Heng. All rights reserved.
//

#include <iostream>
#include <stdio.h>
#include <stdlib.h>
#include <cmath>
#include <cstring>
#include <ios>
#include "in.h"
#include "merge.h"
#include "out.h"
using namespace std;

int nm = 0, nd = 0, n = 0;;//nm蕴含项个数，nd无关项个数，n逻辑变量个数

int main()
{
    //读入信息
    int *min = NULL, *dont = NULL;//读入编号
    input(min, dont, nm, nd, n);
    IMPLICANT *term = NULL, *term2 = NULL;//转换
    in(term, min, dont, nm, nd, n);
    IMPLICANT *essential = NULL;
    int count = MinCover(term,essential,min, nm, nd, n);//求最小覆盖
    Out(essential, count, n);//输出结果
    return 0;
}