import time
import unittest
import warnings
from selenium import webdriver



class FirstWebDriverTest(unittest.TestCase):
    def setUp(self):
        self.driver = webdriver.Chrome("c:/chromedriver/chromedriver.exe")
        self.driver.get("http://localhost/charytatywne/logowanie.php")
        #self.driver1.get("http://localhost/charytatywne/index.php")
        self.NAME = "Jurek"
        self.SURNAME = "Sznurek"
        self.EMAIL = "sznurek@gmail.com"
        self.PASSWORD ="Jurek1234"
        self.PASSWORD1 = "Jurek1234"
        self.NAME_FIELD_XPATH = "//input[@name='imie']"
        self.SURNAME_FIELD_XPATH = "//input[@name='nazwisko']"
        self.EMAIL_FIELD_XPATH = "//input[@name='email']"
        self.PASSWORD_FIELD_XPATH = "//input[@name='haslo1']"
        self.PASSWORD1_FIELD_XPATH = "//input[@name='haslo2']"
        self.LOGIN_BUTTON_XPATH = "//input[@type='submit']"
        self.LOGIN1_BUTTON_XPATH = "//a[@href='rejestracja.php']"
        self.CHECKBOX_XPATH = "//input[@name='regulamin']"
        self.RESULT = "//H1"
        self.PASSWORDLOG_FIELD_XPATH = "//input[@name='haslo']"
        self.STREET_FIELD_XPATH = "//input[@name='ulica']"
        self.NR_FIELD_XPATH = "//input[@name='nr']"
        self.NR1_FIELD_XPATH = "//input[@name='nrm']"
        self.POSTCODE_FIELD_XPATH = "//input[@name='zipcode']"
        self.CITY_FIELD_XPATH = "//input[@name='miasto']"
        warnings.simplefilter('ignore',ResourceWarning)


    def test_check_if_logic_is_still_actual(self):

            self.assertEqual(2 * 2, 4)


    def test_the_test_2(self):
        driver = self.driver


        driver.find_element_by_xpath(self.LOGIN1_BUTTON_XPATH).click()
        driver.find_element_by_xpath(self.NAME_FIELD_XPATH) \
            .send_keys(self.NAME)
        driver.find_element_by_xpath(self.SURNAME_FIELD_XPATH) \
            .send_keys(self.SURNAME)
        driver.find_element_by_xpath(self.EMAIL_FIELD_XPATH) \
            .send_keys(self.EMAIL)
        driver.find_element_by_xpath(self.PASSWORD_FIELD_XPATH) \
            .send_keys(self.PASSWORD)
        driver.find_element_by_xpath(self.PASSWORD1_FIELD_XPATH) \
            .send_keys(self.PASSWORD1)
        driver.find_element_by_name("regulamin").click()
        driver.find_element_by_name("submit").click()
        time.sleep(0)
        result = driver.find_element_by_xpath(self.RESULT).get_attribute("innerHTML")
        self.assertRegex(result, ".*Dziękujemy.*",
                         "Udało sięutworzyć konto")
        time.sleep(3)



    def test_the_test_3(self):
        driver = self.driver



        driver.find_element_by_xpath(self.EMAIL_FIELD_XPATH) \
            .send_keys(self.EMAIL)
        driver.find_element_by_xpath(self.PASSWORDLOG_FIELD_XPATH) \
            .send_keys(self.PASSWORD)
        time.sleep(2)
        driver.find_element_by_name("submit").click()
        time.sleep(2)
        driver.find_element_by_link_text("Ustawienia").click()
        driver.find_element_by_xpath(self.STREET_FIELD_XPATH) \
            .send_keys("Ladna")
        driver.find_element_by_xpath(self.NR_FIELD_XPATH) \
            .send_keys("1")
        driver.find_element_by_xpath(self.NR1_FIELD_XPATH) \
            .send_keys("1")
        driver.find_element_by_xpath(self.POSTCODE_FIELD_XPATH) \
            .send_keys("58-500")
        driver.find_element_by_xpath(self.CITY_FIELD_XPATH) \
            .send_keys("Piekne")
        #time.sleep(10)
        driver.find_element_by_name("submit").click()
        time.sleep(4)
        driver.find_element_by_link_text("Wyloguj").click()
        time.sleep(2)
        result = driver.find_element_by_xpath(self.RESULT).get_attribute("innerHTML")
        self.assertRegex(result, ".*WYRÓŻNIONE.*",
                         "Udało się ustawic dane adresowe i wylogować się")

    def test_the_test_4(self):
        driver = self.driver


        driver.find_element_by_xpath(self.EMAIL_FIELD_XPATH) \
            .send_keys(self.EMAIL)
        driver.find_element_by_xpath(self.PASSWORDLOG_FIELD_XPATH) \
            .send_keys(self.PASSWORD)
        driver.find_element_by_name("submit").click()
        time.sleep(2)
        driver.find_element_by_link_text("Wszystko").click()
        time.sleep(2)
        driver.find_element_by_link_text("Autografy").click()
        time.sleep(2)
        driver.find_element_by_link_text("Przedmioty").click()
        time.sleep(2)
        driver.find_element_by_link_text("Wydarzenia").click()
        time.sleep(2)
        driver.find_element_by_class_name("zawartosc").click()
        time.sleep(2)
        driver.find_element_by_id("kup_teraz").click()
        time.sleep(2)
        result = driver.find_element_by_xpath(self.RESULT).get_attribute("innerHTML")
        self.assertRegex(result, ".*Aktualnie licytujesz.*",
                         "Udało się zalicytować aukcje")

        time.sleep(5)

    def test_the_test_5(self):
        driver = self.driver
        driver.find_element_by_xpath(self.EMAIL_FIELD_XPATH) \
            .send_keys(self.EMAIL)
        driver.find_element_by_xpath(self.PASSWORDLOG_FIELD_XPATH) \
            .send_keys(self.PASSWORD)
        driver.find_element_by_name("submit").click()
        time.sleep(2)
        driver.find_element_by_link_text("Aktualne licytacje").click()
        time.sleep(2)
        driver.find_element_by_link_text("Wygrane licytacje").click()
        time.sleep(2)
        result = driver.find_element_by_xpath(self.RESULT).get_attribute("innerHTML")
        self.assertRegex(result, ".*Wygrane licytacje.*",
                         "Aktualnie licytowane są odpowiednie aukcje i stan wygranych aukcji zgadza się")


    def tearDown(self):
        self.driver.close()
