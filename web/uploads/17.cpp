#include "teamstyle17.h"
#include <stdio.h>

int current_time = 0;

void AIMain() {
    int last_time = 0;
    unsigned count = 0;
    unsigned count_sum = 0;
    unsigned count_min = 65536;
    unsigned count_max = 1;
    while (1) {
        current_time = GetTime();
        if (current_time >= 5000)
            break;
        if (current_time != last_time) {
            count_sum += count;
            if (last_time && count < count_min) {
                count_min = count;
            }
            else if (count > count_max) {
                count_max = count;
            }
            count = 1;
            last_time = current_time;
        }
        else
            ++count;
    }
    printf("GetTime test result: avg=%.2fms min=%.2fms max", 50000.0 / count_sum, 10.0 / count_max);
    if (count_min == 1) {
        putchar('>');
    }
    printf("=%.2fms\n", 10.0 / count_min);
    while (1);
}

