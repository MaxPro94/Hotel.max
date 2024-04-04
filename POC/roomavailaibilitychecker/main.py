from datetime import date


date_d = date(2024, 4, 22)
date_f = date(2024, 4, 24)


date_r_d = date(2024, 4, 3)
date_r_f = date(2024, 4, 21)


cond1 = date_d < date_r_d and date_f > date_r_d and date_f < date_r_f
cond2 = date_d >= date_r_d and date_f <= date_r_f
cond3 = date_d >= date_r_d and date_f > date_r_f and date_d < date_r_f


print(cond1)
print(cond2)
print(cond3)

print("Reservation:", cond1 or cond2 or cond3)
