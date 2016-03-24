#include "teamstyle17.h"
#include "stdio.h"

const Map* map = 0;
void AIMain() {
    int last_time = 0;
    unsigned count = 0;
    unsigned count_sum = 0;
    unsigned count_min = 65536;
    unsigned count_max = 1;
    while (1) {
        map = GetMap();
        if (map->time >= 5000)
            break;
        if (map->time != last_time) {
            count_sum += count;
            if (last_time && count < count_min) {
                count_min = count;
            }
            else if (count > count_max) {
                count_max = count;
            }
            count = 1;
            last_time = map->time;
        }
        else
            ++count;
    }
    printf("GetMap test result: avg=%.2fms min=%.2fms max", 50000.0 / count_sum, 10.0 / count_max);
    if (count_min == 1) {
        putchar('>');
    }
    printf("=%.2fms objects_number=%d\n", 10.0 / count_min, map->objects_number);
    while (1);
}

