find(Pattern("1399888111137.png").similar(0.58))
click(Pattern("1399887961809.png").similar(0.58))
try:
    wait("1399919825615.png",10)
    hover("1399919825615.png")
except FindFailed:
    wait("1399920285562.png",20)
    hover("1399920285562.png")
reg = Region(Region(130,339,889,47))
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
    reg = Region(Region(139,265,880,69))
    reg.findAll("1399897212581.png")
    reg.wait("1400015177040.png",10)
    reg.find("1400015177040.png")
    reg.click("1400015177040.png")
except FindFailed:
    reg = Region(Region(139,265,880,74))
    reg.findAll("1399897212581.png")
    reg.wait("1400015177040.png",10)
    reg.find("1400015177040.png")
    reg.click("1400015177040.png")
find("1400015235880.png")
click(Pattern("1399897020963.png").similar(0.60))