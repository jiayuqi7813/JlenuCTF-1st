arr1 = [6,35,51,43,39,23,6,10,52]
arr2 = [63,124,57,50,43,11,37,45,61,9,9]
arr3 = [61,58,42,9,17,32,53,59,34,50]
key = "LOVERTR"
for i in range(0, len(arr1)):
    index = i % len(key)
    flag_num = ord(key[index])
    ctext_num = arr1[i]
    print(str(chr(ctext_num ^ flag_num)), end='')

for i in range(0, len(arr2)):
    index = i % len(key)
    flag_num = ord(key[index])
    ctext_num = arr2[i]
    print(str(chr(ctext_num ^ flag_num)), end='')

for i in range(0, len(arr3)):
    index = i % len(key)-1
    flag_num = ord(key[index])
    ctext_num = arr3[i]
    print(str(chr(ctext_num ^ flag_num)), end='')
print('\n')