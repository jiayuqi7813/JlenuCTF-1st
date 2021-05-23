from flag import flag
from gmpy2 import invert,gcd
import sympy
from Crypto.Util.number import bytes_to_long,long_to_bytes
import base64
from Crypto.PublicKey import RSA

def get_random_prime(bits):
  return sympy.randprime(2**(bits-1), 2**bits)

def gen_key(bits):
    p = get_random_prime(bits)
    q = get_random_prime(bits)
    r = get_random_prime(bits)
    e = get_random_prime(48)
    assert gcd(e,phi)==1
    d=invert(e,(p-1)*(q-1)*(r-1)//gcd(p-1,(gcd(q-1,r-1))))
    return (e,d,p*q*r)
    
def encrypt(msg,e,n):
    cipher=pow(bytes_to_long(flag),e,n)
    with open(r"nflag.enc","w") as f:
        f.write(hex(cipher)[2:])
        f.close()
        
def export_pubkey(n,e):
    pubkey = RSA.construct((n,e))
    f = open(r'npubkey.pem','wb')
    f.write(pubkey.export_key())
    f.close()


e,d,n=gen_key(256)
export_pubkey(n,e)

print("d:",d)
#d:6848345389131232097250291554774004483864247462767351912899751705063009304102012225840379809975695209148626539132005837425458215616241927473070938221119168859672496841054510245128799501775634965114887272776082740599056090759932017
encrypt(flag,7,n)
