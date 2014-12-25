find(Pattern("1399888111137.png").similar(0.58))
click(Pattern("1399887961809.png").similar(0.58))
try:
    wait("1399919825615.png",10)
    hover("1399919825615.png")
except FindFailed:
    wait("1399920285562.png",20)
    hover("1399920285562.png")
reg = Region(Region(138,337,877,49))
reg.findAll("1399918238258.png")
reg.getLastMatch()
reg.click("1399918238258.png")
try:
    wait("1399918302828.png",10)
    click("1399918302828.png")
except FindFailed:
    wait("1399920012645.png",30)
    click("1399920012645.png")
try:
    wait("1399918337161.png",10)
    find("1399918337161.png")
    click("1399918337161.png")
except FindFailed:
    wait("1399920065128.png",30)
    find("1399920065128.png")
    click("1399920065128.png")

try:
    wait("1399920386710.png",20) 
    find("1399920386710.png")
    click("1399920386710.png")
except FindFailed:
    wait("1399986908367.png",20)
    find("1399986908367.png")
    click("1399986898914.png")
type("Sikuli menulis soal")
try:
    wheel(Pattern("1399920386710.png").similar(0.29), WHEEL_DOWN, 2)
    click("1399920446634.png")
except FindFailed:
    
    wheel(Pattern("1399920386710.png").similar(0.29), WHEEL_DOWN, 2)
    click("1399922551324.png")
type("1")

try:
    wheel("1399920446634.png", WHEEL_DOWN, 3)
except FindFailed:
    
    wheel("1399922551324.png", WHEEL_DOWN, 3)
try:
    reg2 = Region(Region(135,189,891,463))
    reg2.click(Pattern("1399955179252.png").similar(0.43).targetOffset(28,-2))

except FindFailed:
    reg2 = Region(Region(135,189,891,463))
    reg2.click(Pattern("1399957585652.png").targetOffset(17,-2))
type("1400016259769.png", "Ini jawaban A")
wheel("1400016259769.png",WHEEL_DOWN ,5)

type("1400016338801.png", "Ini jawaban B")
wheel("1400016338801.png",WHEEL_DOWN ,5)
type("1400016508215.png", "Ini jawaban C")
wheel("1400016508215.png",WHEEL_DOWN ,4)
type("1400016570838.png", "Ini jawaban D")
wheel("1400016570838.png",WHEEL_DOWN ,5)
type("1400016570838.png", "Ini jawaban E")
try:
    wheel("1399987166588.png",WHEEL_DOWN, 18)

except FindFailed:
    wheel("1399987176816.png",WHEEL_DOWN, 18)
type(Key.PAGE_DOWN)
try:
    click("1399989010369.png")
except FindFailed:
    pass