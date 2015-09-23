#include <stdio.h>
#include <string.h>

/*结构体作为函数参数*/

/*定义一个Book的结构体*/
struct Book{
	char title[50]; // 标题
	char author[500]; // 作者
	char content[500]; //内容简介
	int  code;   // 编号
};

//void printBook(struct Book book);

int main()
{
	struct Book book2;

	strcpy(book2.title, "鸟哥的linux私房菜");
	strcpy(book2.author, "鸟哥");
	strcpy(book2.content, "linux学习圣经");
	book2.code = 13003;

	printBook(book2);//调用函数的时候只输入参数就可以了

	return 0;
}

/*printBook 方法输出book的一些信息*/
void printBook(struct Book book)
{
	printf("book title:%s\n", book.title);
	printf("book author:%s\n", book.author);
	printf("book content:%s\n", book.content);
	printf("book code:%d\n", book.code);
}