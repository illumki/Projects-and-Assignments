import csv
import operator
with open('foo.csv', 'r') as csv_file:
    csv_reader = csv.reader(csv_file)
    unitedStates = []
    sort = sorted(foo, key=operator.itemgetter(2))
    for line in csv_reader:
        for field in row:
            if field == US:
                unitedStates.append(field[0],field[3],field[4])
            else:
                pass

with open('pop.txt', 'w', newline = ' ') as txt_file:
    writer = csv.writer(txt_file)