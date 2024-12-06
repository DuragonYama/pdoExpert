'''
Ömer Aydin - OITSDO3C
'''

import sys 
import time 

uppercase_used = False
number_used = False
eight_digits_used = False

def check_password(x: str):
    global uppercase_used
    global number_used
    global eight_digits_used

    for char in x:
        if char.isupper():
            uppercase_used = True
        elif char.isnumeric():
            number_used = True
    
    eight_digits_used = True if len(x) >= 8 else False
    
    if all([uppercase_used, number_used, eight_digits_used]):
        return True
    else:
        return False

while True:
    try:
        password = input("Wat is het wachtwoord? ")

        if check_password(password):
            print("Wachtwoord is zonder problemen ingesteld")
            sys.exit(0)
        else:
            print("Dit wachtwoord voldoet niet aan de gestelde eisen!")
            continue
    except KeyboardInterrupt:
        print("/nProgramma is handmatig afgesloten")
        sys.exit(0)
    except Exception as error:
        print(f"Er is een fout {error}")
        sys.exit(0)
    finally:
        print(f"Finally statement geprint op {time.strftime('%H:%M:%S')}")
