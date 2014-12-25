find(Pattern("1400032783069.png").similar(0.90))
click(Pattern("1400032783069.png").similar(0.90))
wait(Pattern("1416966137179.png").similar(0.59))
click("1400032944114.png")
type("user123")
click("1400032975923.png")
type("user123")
click("1397320268705.png")
mImg1 = exists("1416965847267.png")
if mImg1:
    click("1416965871806.png")
assert exists("1419475712254.png")

