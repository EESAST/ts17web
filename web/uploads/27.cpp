//
//  main.cpp
//  改－用队列实现第九次编程作业－最长合法数组
//
//  Created by Lin,Tzu-Heng on 12/26/15.
//  Copyright © 2015 Lin, Tzu-Heng. All rights reserved.
//

#include <iostream>
#include <stdlib.h>
#include <stdio.h>
#include <cmath>
using namespace std;

struct duilie{
    int data;
    int position;//Position int the original A[]
    duilie* next;
    duilie* before;
};
//有序链式循环队列，由小到大

int main(int argc, const char * argv[]) {
    
    //申请空间、输入数据
    int N;//数组的长度
    int d;//阈值
    //int shortlen = 1;//最短非法子数组的长度
    int longlen = 1;//最长合法子数组的长度
    cin>>N>>d;//输入数据
    int *A = new int[N];//申请一个长度为N的数组A
    for(int i=0;i<N;i++){//给数组A赋值
        cin>>A[i];
    }
    //申请空间、输入数据 结束
    
    int length=0;//队列的长度
    
    /********测试是否输入成功********/
    /*
    for (int i=0; i<N; i++) {
        cout<<A[i]<<" ";
    }
    */
    /*****************************/
    
    //插入A[0]
    struct duilie *row=new duilie;
    length=1;
    row->data=A[0];
    row->position=0;
    
    
    
    int i=0;
    int temp=0;
    //***************主循环开始
    while (i<N) {
        if(abs(A[i]-row->data)<d && abs(A[i]-row->before->data)<d){
            /*插入函数还没写*****************/
            duilie* temp=new duilie;
            temp->position=i;
            temp->data=A[i];
            row->before=temp;
            /******************************/
            length++;
        }
        else if(abs(A[i]-row->data)>=d || abs(A[i]-row->before->data)>=d){
            int pos=0;//当前队列的位置
            int biggestpos=0;//距离不满足性质的元素最近的不满足条件的元素在A数组中的位置
            
            while (abs(A[i]-row->data)>=d) {
                if(row->position>=biggestpos){
                    biggestpos=row->position;
                }
                row=row->next;
                pos++;
            }
            
            for (int i=pos; i<length-1; i++) {//将row移动到最后一个元素
                pos++;
                row=row->next;
            }
            
            cout<<endl<<"当前队列的位置为"<<pos<<"（应该在最后一个［"<<length-1<<"］）"<<endl;//检查队列指针是否移到了最后一个元素上
            
            while (abs(A[i]-row->data)>=d) {
                if(row->position>=biggestpos){
                    biggestpos=row->position;
                }
                row=row->before;
                pos--;
            }
            
            for (int i=pos; i>0; i++) {//将row移动到第一个元素
                pos--;
                row=row->before;
            }
            
            cout<<endl<<"当前队列的位置为"<<pos<<"（应该在第一个［0］）"<<endl;//检查队列指针是否移到了第一个元素上
            
            cout<<"距离不满足性质的元素最近的不满足条件的元素是A数组里的A["<<biggestpos<<"]元素";
            
            //将位置在biggestpos及之前的元素移除队列
            for (int i=0; i<length; i++) {
                if (row->position<=biggestpos) {
                    remove();//将元素移出队列移除函数还没写************
                }
                /******不知道需不需要，根据上面的remove函数
                row=row->next;
                */
            }
            
        }
        if(length>longlen){
            longlen=length;
        }
        i++;
        
        
    }
    //****************主循环结束
    
    
    return 0;
}
