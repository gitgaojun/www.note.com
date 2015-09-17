#include <stdio.h>

int main(){
    int arr[10];

    int i;

    for(i=1;i<11;++i)
    {
    	printf("i=%d\n", i);
    	arr[i] = 100+i; 
    }

    for(i=1;i<11;++i){
        printf("arr[%d]=%d\n", i, arr[i]);
    }


    return 0;
}