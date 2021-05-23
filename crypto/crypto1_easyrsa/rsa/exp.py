from Crypto.PublicKey import RSA
from Crypto.Util.number import *
from gmpy2 import *

d=6848345389131232097250291554774004483864247462767351912899751705063009304102012225840379809975695209148626539132005837425458215616241927473070938221119168859672496841054510245128799501775634965114887272776082740599056090759932017
#解析公钥文件
with open(r"npubkey.pem", 'r') as f:
    key=RSA.importKey(f.read())
    n=key.n
    e=key.e
#读取密文   
cipher=int(open(r"nflag.enc","rb").read().decode(),16)

print(n,e)

#爆破lam,求phi
for lam in range(1,200):
    kphi=lam*(e*d-1)
    k=kphi//n+1
    if kphi%k==0:
        phi=kphi//k
        print(phi,lam)
        break
   
e=7
#e和phi不互素，只是其中一个素数因子有7,把它剔除再求解。


m=pow(2,phi//7,n)
1==pow(2,phi,n)
qr=gcd(m-1,n)

p=n//qr
d=invert(e,phi//(p-1))


print(long_to_bytes(pow(cipher,d,qr)))
