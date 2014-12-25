find(Pattern("1399888111137.png").similar(0.58))
click(Pattern("1399887961809.png").similar(0.58))
reg = Region(Region(138,337,877,49))
reg.findAll("1399918238258.png")
reg.getLastMatch()
reg.click("1399918238258.png")
click("1419478309472.png")
try:
    find("1399918337161.png")
    click("1399918337161.png")
except FindFailed:
    find("1399920065128.png")
    click("1399920065128.png")

wait("1419478462730.png",30)
click("1419478462730.png")
type("Sikuli menulis soal")
try:
    wheel(Pattern("1399920386710.png").similar(0.29), WHEEL_DOWN, 2)
    click("1419478670857.png")
except FindFailed:
    
    wheel(Pattern("1399920386710.png").similar(0.29), WHEEL_DOWN, 2)
    click("1419478662248.png")
type("5")

wheel("1419478662248.png", WHEEL_DOWN, 3)

click("1419478808058.png")

type("Ini jawaban A")
wheel(WHEEL_DOWN ,5)
click("1419479059298.png")
type("Ini jawaban B")
wheel(WHEEL_DOWN ,5)
click("1419479174978.png")
type("Ini jawaban C")
wheel(WHEEL_DOWN ,5)
click("1419479196168.png")
type("Ini jawaban D")
wheel(WHEEL_DOWN ,5)
click("1419479244504.png")
type("Ini jawaban E")
click("1419479406609.png")
click("1399989010369.png")
assert exists("1419479717075.png")
