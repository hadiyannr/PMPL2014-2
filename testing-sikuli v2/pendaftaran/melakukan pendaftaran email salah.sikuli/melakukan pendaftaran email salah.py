find("Daftar-1.png")
click(Pattern("Daftar-1.png").targetOffset(-1,-1))
wait("DaftarUserna.png")
click(Pattern("UsernameNoSp.png").targetOffset(-97,15))
type("testerg")
type(Key.TAB)
type("hanifnaufal7557@gmail.com")
type(Key.TAB)
type("testerganteng")
type(Key.TAB)
type("testerganteng")
click("1419483392835.png")
assert exists("emailtelahte.png")