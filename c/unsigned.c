#include <stdio.h>
#include <string.h>

/*111

001
010
011
100
101
110
111*/

/**
 * 先声明的位域，定义长度为3.那么8就是超过这个长度的数，就会得到空值
 */
struct 
{
	unsigned int age : 3;
}people;

int main(){

	people.age = 4;
	printf("people.age: %d\n", people.age);

	people.age = 7;
	printf("people.age: %d\n", people.age);

	people.age = 8;
	printf("people.age: %d\n", people.age);
	people.age = 8;
	printf("people.age: %d\n", people.age);

	return 0;
}
