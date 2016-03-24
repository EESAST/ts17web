#include "teamstyle17.h"
#include <stdio.h>

const Status *status = NULL;

void AIMain() {
    Speed speed = { 0,0,0 };
    int current_time = 0, count = 0;
    status = GetStatus();
    Move(status->objects[0].id, speed);
    while (GetTime()<5000) {
        Move(status->objects[0].id, speed);
        ++count;
    }
    printf("Move test result: avg=%.4fms", 50000.0 / count);
    while (1);
}

