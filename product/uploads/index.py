# Ömer Aydin - OITSD03C

# DEEL 1
import faker
import random

fake = faker.Faker()

e = input("Hoeveel namen wilt u?")
lijst = []

if not e.isnumeric():
    print("Dit is niet een getal")
    exit()
else:
    e = int(e)
    for x in range(e):
        naam = fake.name()
        lijst.append(naam)
        print(naam)
print(lijst)

# DEEL 2

leegSet = set()

def list_checker(e):
    if e.startswith("C"):
        leegSet.add(e)

list_checker("Ceci")
list_checker("Hans")
list_checker("Clorinda")

print(leegSet)

# DEEL 3

convertedList = list(leegSet)

if leegSet:
    print("Er zijn", len(convertedList), "namen in de list dat starten met een C")
    print("Bijvoorbeeld:", random.choice(convertedList))
else:
    print("Er is geen naam dat begint met C")

# DEEL 4

Neppe_persoon = {
    "name": random.choice(convertedList),
    "age": random.randint(1, 99),
    "City": fake.city(),
    "Postal Code": fake.postalcode(),
    "Admin": fake.boolean()
}

print(Neppe_persoon.items())