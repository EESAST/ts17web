

#include<iostream>
#include<stdlib.h>
using namespace std;
#ifndef INF
#define INF 2147483647
#endif
#define up(x,n)				((x-n)>-1?x-n:-1)
#define down(x,n)			((x+n)<n*n?x+n:-1)
#define left(x,n)			((x%n==0)?-1:x-1)
#define right(x,n)			((x+1)%n==0?-1:x+1)
#define min(x,y)			((x)<(y)?(x):(y))
struct Item
{
	short weight;
	short target;
	bool visited;
	int cost;
	Item() :weight(-1), target(-1),cost(INF),visited(0) {}
};
Item *matrix=NULL;
short *sortIndex;
short sortSize;
struct P{
	short size;
	short start;
	short end;
	void initmatrix(Item *mat) {
		
		}
} Puzzle;

void initmatrix( P *Puzzle) {
	matrix = new Item[Puzzle->size*Puzzle->size];
	sortIndex = new short[Puzzle->size*Puzzle->size];
	sortSize = 0;
}
void BuildHeap(short *a, short size, Item* mat);
void SpanningTree(short start);
int main() {
	cin >> Puzzle.size >> Puzzle.start>> Puzzle.end;
	int N = Puzzle.size;
	--Puzzle.start;
	--Puzzle.end;
	initmatrix(&Puzzle);
	int i = -1;
	while (++i< N*N) {
		cin >> matrix[i].weight;
		if (matrix[i].weight == 0) {
			short j;
			cin >> j;
			matrix[i].target = j - 1;
		}
	}
	if (matrix[Puzzle.start].weight==-1) {
		cout << INF;
		return 0;
	}
	matrix[Puzzle.start].cost = matrix[Puzzle.start].weight;
	SpanningTree(Puzzle.start);
	return 0;
}
void SpanningTree(short start) {
	matrix[start].visited = 1;
	int temp;
	if ((temp = up(start, Puzzle.size)) != -1&&matrix[temp].visited==0) {
		if (temp == Puzzle.end) {
			cout << matrix[start].cost;
			exit(0);
		}
		if (matrix[temp].weight != -1) {

			if (matrix[temp].cost == INF) {
				matrix[temp].cost = matrix[start].cost + matrix[temp].weight;
				sortIndex[sortSize++] = temp;
			}
			else matrix[temp].cost = min(matrix[temp].cost, matrix[start].cost + matrix[temp].weight);
		}
	}
	if ((temp = down(start, Puzzle.size)) != -1 && matrix[temp].visited == 0) {
		if (temp == Puzzle.end) {
			cout << matrix[start].cost;
			exit(0);
		}
		if (matrix[temp].weight != -1) {

			if (matrix[temp].cost == INF) {
				matrix[temp].cost = matrix[start].cost + matrix[temp].weight;
				sortIndex[sortSize++] = temp;
			}
			else matrix[temp].cost = min(matrix[temp].cost, matrix[start].cost + matrix[temp].weight);
		}
	}
	if ((temp = right(start, Puzzle.size)) != -1 && matrix[temp].visited == 0) {
		if (temp == Puzzle.end) {
			cout << matrix[start].cost;
			exit(0);
		}
		if (matrix[temp].weight != -1) {

			if (matrix[temp].cost == INF) {
				matrix[temp].cost = matrix[start].cost + matrix[temp].weight;
				sortIndex[sortSize++] = temp;
			}
			else matrix[temp].cost = min(matrix[temp].cost, matrix[start].cost + matrix[temp].weight);
		}
	}
	if ((temp = left(start, Puzzle.size)) != -1 && matrix[temp].visited == 0) {
		if (temp == Puzzle.end) {
			cout << matrix[start].cost;
			exit(0);
		}
		if (matrix[temp].weight != -1) {

			if (matrix[temp].cost == INF) {
				matrix[temp].cost = matrix[start].cost + matrix[temp].weight;
				sortIndex[sortSize++] = temp;
			}
			else matrix[temp].cost = min(matrix[temp].cost, matrix[start].cost + matrix[temp].weight);
		}
	}
	if ((temp=matrix[start].target)!=-1 && matrix[temp].visited == 0) {
		if (temp == Puzzle.end) {
			cout << matrix[start].cost;
			exit(0);
		}
		if (matrix[temp].weight != -1) {

			if (matrix[temp].cost == INF) {
				matrix[temp].cost = matrix[start].cost + matrix[temp].weight;
				sortIndex[sortSize++] = temp;
			}
			else matrix[temp].cost = min(matrix[temp].cost, matrix[start].cost + matrix[temp].weight);
		}
	}
	BuildHeap(sortIndex, sortSize, matrix);
	if (sortSize == 0) {
		cout << INF;
		exit(0);
	}
	swap(sortIndex[0], sortIndex[--sortSize]);
	SpanningTree(sortIndex[sortSize]);
}

void HeapAdjust(short *a, short i, short size, Item *mat) {//调整堆
	if (i <size/2) {			//如果i是叶节点就不用进行调整
		short lchild = 2 * i+1;       //i的左孩子节点序号 
		short rchild = 2 * i + 2;     //i的右孩子节点序号 
		short min = i;            //临时变量 
		if (mat[a[lchild]].cost <mat[a[min]].cost)min = lchild;
		if (rchild<size&&mat[a[rchild]].cost < mat[a[min]].cost)min = rchild;
		if (min != i) swap(a[i], a[min]);
	}
}

void BuildHeap(short *a,short size, Item* mat) {
	int i;
	for (i = size/ 2-1; i >= 0; i--) {   //非叶节点最大序号值为size/2 
		HeapAdjust(a, i, size,mat);
	}
}