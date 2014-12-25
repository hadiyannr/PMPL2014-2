testJudul = "Lorem Ipsum"
isi1 = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ullamcorper luctus ante at accumsan. Pellentesque eu mollis"
isi2 = "Vestibulum nibh risus, pellentesque sit amet neque efficitur, venenatis accumsan libero. Nunc vehicula pellentesque lacus, eu tristique tellus fermentum condimentum. Vivamus a tellus id dui vehicula posuere. Quisque sit amet lectus eget tellus tincidunt pretium"
isi3 = "Donec nibh odio, iaculis nec erat id, facilisis rhoncus nulla. Sed a quam auctor, mollis augue at, porttitor libero. Sed non tellus nec lectus elementum hendrerit. "
find("1419493300032.png")
click("1419493300032.png")
find("1419493377215.png")
click("1419493394081.png")
click(Pattern("1419493512583.png").targetOffset(-171,10))
type(testJudul)
click("1419493527861.png")
type(isi1)
click("1419494341413.png")
type(Key.END)
wait(3)
find("1419494403349.png")
click("1419494415909.png")
click("1419494442077.png")
assert exists("1419494495500.png")
assert exists("1419494511532.png")