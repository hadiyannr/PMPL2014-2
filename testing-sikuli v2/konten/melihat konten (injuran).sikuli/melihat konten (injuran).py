find("Konten.png")
click("Konten.png")
click("lnformasiFak.png")
wait("HomeDaftarKo.png")
find("SejarahFakul.png")
click(Pattern("SejarahFakul.png").targetOffset(96,37))
assert exists("FakultasTekn.png")