find("1416965542640.png")
click("1397320204621.png")
wait(Pattern("1416972778373.png").similar(0.59))
click("1397320213579.png")
type("hanifnaufal")
click("1397320239079.png")
type("asdasdasd")
click("1397320268705.png")
chromeImg = exists("1416965847267.png")
if chromeImg:
    click("1416965871806.png")
assert exists("1416965571310.png")


