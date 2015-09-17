#include <stdio.h>

int main()
{
	/* 编写一个& + 变量名表示指针指向的位置的例子 */

	int a=90;
	int b=120;

	printf("a->%x\nb->%x\n", &a, &b);

	return 0;
}