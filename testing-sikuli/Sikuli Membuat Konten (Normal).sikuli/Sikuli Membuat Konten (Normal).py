find("1399992589605.png")
click("1399992623376.png")
time.sleep(3)
find("1399992636200.png")
click("1399992642517.png")
click(Pattern("1399993500863.png").similar(0.77))
type("Hasil SIMAK UI")
time.sleep(2)
click("1400027994633.png")
type("coba-coba isi konten")
wheel("1400027994633.png",WHEEL_DOWN,3)
try:
    find("1399993349870.png")
except FindFailed:
    find("1417033944695.png") 
try:
    click("1399993354577.png")
except FindFailed:
    click("1417033988903.png")
try:
    click("1399993360505.png")
except FindFailed:
    click("1417034028664.png")
assert exists("1419481719524.png")


