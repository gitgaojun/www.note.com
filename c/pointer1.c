#include <stdio.h>

int main()
{
	/* 看看如是使用 *+名字来获取指针所指内存位置的值 */

	/* int *ip 同时设置了ip是int *ip也是int类型 */

	int i;
	int *ip;



	i = 99;
	ip = &i;

	printf("ipointervalue = %d\n", *ip);


	return 0;
}