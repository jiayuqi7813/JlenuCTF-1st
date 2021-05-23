I = imread('mix2.png');   %读取图片
%t1 = imnoise(I,'salt & pepper',0.5);
t=imdivide(I,0.9);
t2=median_filter(t,3);
figure,imshow(t2),title('中值滤波后')