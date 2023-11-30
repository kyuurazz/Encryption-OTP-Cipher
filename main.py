# Merubah String ke nomor ASCII
def konversiascii(input_string):
    ascii_values = []
    for char in input_string:
        ascii_value = ord(char)
        ascii_values.append(ascii_value)
    return ascii_values


# Merubah nomor ASCII ke Biner
def konversibiner(input_string):
    binary_values = []
    for char in input_string:
        binary_value = bin(ord(char))[2:]
        binary_values.append(binary_value.zfill(8))  # Pad dengan 0 di depan jika kurang dari 8 bit
    return binary_values


# Melakukan Operasi XOR
def xor_biner(biner1, biner2):
    num1 = int(biner1, 2)
    num2 = int(biner2, 2)
    result = num1 ^ num2
    result_biner = bin(result)[2:]
    return result_biner.zfill(len(biner1))  # Pad dengan 0 di depan jika panjang berbeda


# Konversi hasil Biner ke Desimal
def biner_ke_desimal(biner):
    return int(biner, 2)


# Konversi hasil Desimal ke ASCII
def kodeascii(ascii_code):
    return chr(ascii_code)


# Fungsi Enkripsi Plaintext dan Key
def encrypt(plaintext, key):
    plaintext_ascii = konversiascii(plaintext)
    key_binary = konversibiner(key)

    ciphertext_binary = []
    for i in range(len(plaintext_ascii)):
        plaintext_binary = bin(plaintext_ascii[i])[2:].zfill(8)
        ciphertext_binary.append(xor_biner(plaintext_binary, key_binary[i]))

    ciphertext_decimal = [biner_ke_desimal(binary) for binary in ciphertext_binary]
    ciphertext_ascii = ''.join([kodeascii(decimal) for decimal in ciphertext_decimal])

    return ciphertext_ascii


# Fungsi Dekripsi Ciphertext dan Key
def decrypt(ciphertext, key):
    ciphertext_ascii = konversiascii(ciphertext)
    key_binary = konversibiner(key)

    plaintext_binary = []
    for i in range(len(ciphertext_ascii)):
        ciphertext_binary = bin(ciphertext_ascii[i])[2:].zfill(8)
        plaintext_binary.append(xor_biner(ciphertext_binary, key_binary[i]))

    plaintext_decimal = [biner_ke_desimal(binary) for binary in plaintext_binary]
    plaintext_ascii = ''.join([kodeascii(decimal) for decimal in plaintext_decimal])

    return plaintext_ascii


# Form Input
plaintext = input("Masukan Plaintext : ")
key = input("Masukan Key : ")


# Enkripsi
ciphertext = encrypt(plaintext, key)
print("Ciphertext:", ciphertext)


# Dekripsi
decrypted_text = decrypt(ciphertext, key)
print("Decrypted Text:", decrypted_text)
