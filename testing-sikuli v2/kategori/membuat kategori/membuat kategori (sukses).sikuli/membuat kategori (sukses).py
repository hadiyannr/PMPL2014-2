find("Kategori.png")
click("Kategori.png")
find("BuatKategori-1.png")
click(Pattern("BuatKategori-1.png").targetOffset(-13,3))
wait("BuatKateOl-1.png")
click(Pattern("Nama.png").targetOffset(-130,9))
type("Tester")
click("1419495425238.png")
assert exists("1419495504548.png")