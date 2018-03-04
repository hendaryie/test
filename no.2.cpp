#include <iostream>
using namespace std;

int kali (int e, int d);

int main() {
	cout<<">>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> Menghitung Perkalian Bilangan Dengan Opertaor Tambah <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<"<<endl;
	cout<<" "<<endl;
	int a,b;
	
	cout<<"Angka yang Dikalikan = ";
	cin>>a;
	cout<<"Angka yang Mengalikan =";
	cin>>b;
	cout<< a <<" x "<< b <<" = ";
	
	cout<<kali (a,b);
}

int kali(int c,int d)
{
	int ri=1;
	
	if(ri==d){
		cout<<c<<" = ";
		return c;
	}else{
		cout<<c<<" + ";
		return c+kali(c,d-1);
	}
}
