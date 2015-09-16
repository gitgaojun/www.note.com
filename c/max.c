#include <stdio.h>

int max(int a,int b);

main()
{
	int num1;
	int num2;
	num1 = 3;
	num2 = 7;

	int ref;

	ref = max(num1,num2);

	printf("%d,%d比较,最大的数是%d\n", num1, num2, ref);

	//return 0;
}

int max(int a, int b){
	int result;
	if(a-b > 0){
		result = a;
	}else{
		result = b;
	}

	return result;
}
