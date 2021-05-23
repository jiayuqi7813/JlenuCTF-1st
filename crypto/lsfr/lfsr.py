from Crypto.Util.strxor import *
from binascii import *
import hashlib
from Crypto.Util.number import *

def lfsr(R, mask):
        output = (R << 1) & 0xffffffffffffffff
        i=(R&mask)&0xffffffffffffffff
        lastbit=0
        while i!=0:
                lastbit^=(i&1)
                i=i>>1
        output^=lastbit
        return (output,lastbit)
    
mask=0b1010110101101101001011010111101100010110011110001010110101101101
flag1="***************"
flag2="***************"
assert len(flag1)==len(flag2)

#py3
flag="JlenuCTF{"+hashlib.md5((flag1+flag2).encode("utf8")).hexdigest()+"}"

R1=int(flag1,16)
R2=int(flag2,16)

f=open(r"key.txt","wb")
for i in range(16):
    tmp=0
    for j in range(4):
        (R1,out1)=lfsr(R1,mask)
        (R2,out2)=lfsr(R2,mask)
        out=out1<<1^out2
        tmp=(tmp<<2)^out
        
    f.write(long_to_bytes(tmp))
f.close()
