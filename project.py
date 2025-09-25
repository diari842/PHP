class Person:
    def __init__(self, name, age, weight, height):
        self.name = name
        self.age = age
        self._weight = weight
        self._height = height

    @property
    def weight(self):
        return self._weight

    @property
    def height(self):
        return self._height

    def calculate_bmi(self):
        raise NotImplementedError("Subclasses should implement this!")

    def get_bmi_category(self):
        bmi = self.calculate_bmi()
        if bmi < 18.5:
            return "Underweight"
        elif 18.5 <= bmi < 25.0:
            return "Healthy Weight"
        elif 25.0 <= bmi < 30.0:
            return "Overweight"
        else:
            return "Obesity"

    def print_info(self):
        print(f"Name: {self.name}, Age: {self.age}")
        print(f"BMI: {self.calculate_bmi():.2f} ({self.get_bmi_category()})")


class Adult(Person):
    def calculate_bmi(self):
        return self.weight / (self.height ** 2)


class Child(Person):
    def calculate_bmi(self):
        return (self.weight / (self.height ** 2)) * 1.3


class BMIApp:
    def __init__(self):
        self.people = []

    def add_person(self, person):
        self.people.append(person)

    def collect_user_data(self):
        name = input("Enter name: ")
        age = int(input("Enter age: "))
        weight = float(input("Enter weight (kg): "))
        height = float(input("Enter height (m): "))

        if age >= 18:
            person = Adult(name, age, weight, height)
        else:
            person = Child(name, age, weight, height)

        self.add_person(person)

    def print_results(self):
        for person in self.people:
            person.print_info()
            print("-" * 30)

    def run(self):
        while True:
            self.collect_user_data()
            more = input("Add another person? (y/n): ")
            if more.lower() != 'y':
                break
        self.print_results()


# To run the app
if __name__ == "__main__":
    app = BMIApp()
    app.run()
