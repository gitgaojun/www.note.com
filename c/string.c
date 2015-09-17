#include <stdio.h>
#include <string.h>

int main(){
	char say[6]={
		'h','e','l','l','o','\0'
	};

	int len;

	len = strlen(say);

	printf("say's length %d\n",len);

	return 0;
}
