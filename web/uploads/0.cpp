//
//  main.cpp
//  第十题－随机算法
//
//  Created by Lin,Tzu-Heng on 12/28/15.
//  Copyright © 2015 Lin, Tzu-Heng. All rights reserved.
//

#include <iostream>
#include <stdio.h>
#include <stdlib.h>
#include <cmath>
#include <ctime>
using namespace std;

int main() {
    
    srand(142857);

    int A[100],B[100];
    long long P1[1001],P2[1001];
    
    int outputnum[1001];
    
    int i=0,j=0;
    
    long long multiplier1,multiplier2;
    int inputnum;
    
    int sum=0;
    
    for (i=0; i<1001; i++) {
        P1[i]=1;P2[i]=1;
    }
    
    
    for (i=0; i<100; i++) {
        cin>>A[i];
    }
    for (i=0; i<100; i++) {
        cin>>B[i];
    }
    
    for (j=0; j<100000; j++) {
        sum=0;
        for (i=0; i<10; i++) {
            sum+=A[rand()%100];
        }
        P1[sum]++;
    }
    for (j=0; j<100000; j++) {
        sum=0;
        for (i=0; i<10; i++) {
            sum+=B[rand()%100];
        }
        P2[sum]++;
    }
    
    for (i=0; i<1000; i++) {
        multiplier1=1;multiplier2=1;
        for (j=0; j<100; j++) {
            cin>>inputnum;
            multiplier1=multiplier1*P1[inputnum];
            multiplier2=multiplier2*P2[inputnum];
        }
        if (multiplier1>multiplier2) {
            outputnum[i]=0;
        }else{
            outputnum[i]=1;
        }
    }
    
    for (i=0; i<1000; i++) {
        printf("%d",outputnum[i]);
        if (i<999) {
            printf("\n");
        }
    }
    return 0;
}
