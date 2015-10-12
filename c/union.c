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

	printf("union %d\n", p);
	//printf("union %d\n", p.age);
	// 公共体里面的参数 当没有指定的时候，会根据需要动态选择输出，可是这样不规范
	// 容易混淆。不建议这样做

	return 0;
}
