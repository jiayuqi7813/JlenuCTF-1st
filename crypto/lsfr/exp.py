with open(r"key.txt","rb") as f:
    c=f.read()
    f.close
 
from Crypto.Util.number import *
c=bin(bytes_to_long(c))[2:]
C=[]
for i in range(0,len(c),2):
    C.append(int(c[i:i+2],2))
 
out1=""
out2=""
for i in C:
    if i==3:
        out1+="1"
        out2+="1"
    if i==2:
        out1+="1"
        out2+="0"
    if i==1:
        out1+="0"
        out2+="1"
    if i==0:
        out1+="0"
        out2+="0"
 
KEY=[]
mask="1010110101101101001011010111101100010110011110001010110101101101"
for i in range(len(mask)):
    if mask[i]=="1":
        KEY.append(i)
        
flag1=""
out1=out1[:64]
 
for i in range(64):
    
    im="1"+flag1+out1[:63-i]
    
    K=int(im[KEY[0]])
    for j in range(1,len(KEY)):
        K^=int(im[KEY[j]])
        
    if K==int(out1[63-i]):
        flag1="1"+flag1
    else:
        flag1="0"+flag1
        
out2=out2[:64]
flag2=""
for i in range(64):
    
    im="1"+flag2+out2[:63-i]
    
    K=int(im[KEY[0]])
    for j in range(1,len(KEY)):
        K^=int(im[KEY[j]])
        
    if K==int(out2[63-i]):
        flag2="1"+flag2
    else:
        flag2="0"+flag2
flag1=hex(int(flag1,2))[2:]
flag2=hex(int(flag2,2))[2:]
import hashlib
print("JlenuCTF{"+hashlib.md5((flag1+flag2).encode("utf8")).hexdigest()+"}")
