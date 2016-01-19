
#include "io430.h"

int main( void )
{
  int i;
  // Stop watchdog timer to prevent time out reset
  WDTCTL = WDTPW + WDTHOLD;
  P2SEL=0;
  P2SEL2=0;
  P2OUT=0xff;
  while(1)
  {
    P2OUT=~P2OUT;
    for(i=0;i<0xffff;i++);
  }
  return 0;
}
