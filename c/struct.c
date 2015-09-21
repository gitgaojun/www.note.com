#include <stdio.h>
#include <string.h>

/*定义一个Book结构体*/
struct Book{
		char title[100];       //  标题
		char author[500];      //  作者
		char content[500];     //  内容简介
		int  code;             //  图书编号

};

int main()
{
	struct Book book1; // 声明book1 ,类型为Book
	struct Book book2; // 声明book2, 类型为Book
	

	strcpy(book1.title, "细说php");
	strcpy(book1.author, "高");
	strcpy(book1.content, "php入门书籍");
	book1.code = 13000;

	strcpy(book2.title, "鸟哥的linux私房菜");
	strcpy(book2.author, "鸟哥");
	strcpy(book2.content, "linux学习圣经");
	book2.code = 13003;

	printf("book1 titls->%s\n", book1.title);
	printf("book1 author->%s\n", book1.author);
	printf("book1 content->%s\n", book1.content);
	printf("book1 titls->%d\n", book1.code);
	printf("book2 titls->%s\n", book2.title);
	printf("book2 author->%s\n", book2.author);
	printf("book2 content->%s\n", book2.content);
	printf("book2 titls->%d\n", book2.code);

	return 0;
}