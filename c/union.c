#include <stdio.h>
#include <string.h>

union people{
	char str[4];
	int  age;
};

int main(){
	union people p;
	// strcpy(p.str, 'jun'); 执行错误
	strcpy(p.str, "jun"); //执行成功
	// 说明c中字符串必须使用双引号
	// 百度后得知：c中单引号表示字符，双引号表示字符串
	p.age = 18;

	printf("union %d\n", p.age);
	return 0;
}
