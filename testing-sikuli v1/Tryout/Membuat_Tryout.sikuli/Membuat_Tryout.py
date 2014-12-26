find(Pattern("1399888111137.png").similar(0.58))
click(Pattern("1399887961809.png").similar(0.58))
wait(Pattern("1399886076156.png").similar(0.50),40)
click("1399881547309.png")
wait(Pattern("1399886504978.png").similar(0.44),40)
find(Pattern("1399886504978.png").similar(0.44))
click(Pattern("1399886514181.png").similar(0.44).targetOffset(-32,7))
type("Sikuli Test 2")
find(Pattern("1399886588467.png").similar(0.44))
click(Pattern("1399886223694.png").similar(0.43))
wait(Pattern("1399886320263.png").similar(0.24))
find(Pattern("1399886625821.png").similar(0.27))
try:
        click("1399889771388.png")
        pass # it is there
except FindFailed:
        click("1399890885227.png")

waitVanish(Pattern("1399886625821.png").similar(0.27))
try:
    click(Pattern("1399889869786.png").similar(0.56))
except FindFailed:
        click(Pattern("1399892116913.png").similar(0.57))
wait(Pattern("1399886705795.png").similar(0.24))
dragDrop(Pattern("1399887294022.png").similar(0.52),Pattern("1399887308337.png").similar(0.53) )
try:
    click("1399890290623.png")
except FindFailed:
        click("1399892222235.png")
waitVanish(Pattern("1399886705795.png").similar(0.24))
try:
    click(Pattern("1399886791129.png").similar(0.41).targetOffset(0,9))
    type("119")
except FindFailed:
    find("1399893390544.png")
    click(Pattern("1399893406214.png").similar(0.53))
    type("119")
try:
    find("1399890547068.png")
    click("1399890547068.png")
except FindFailed:
    find("1399892608813.png")
    click("1399892608813.png")
assert exists(Pattern("1399891153266.png").similar(0.16))