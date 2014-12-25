OldPassword = "jelek2"
NewPassword = "jelek2"
find("1400048218784.png")
click("1400048218784.png")
wait("1400048265601.png",5)
find("1400048265601.png")
type("1400048279429.png",OldPassword )
type(Key.TAB)
type(NewPassword)
type(Key.TAB)
type(NewPassword)
type(Key.ENTER)
assert exists("1419480923852.png")