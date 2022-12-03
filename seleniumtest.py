from selenium.webdriver.chrome.service import Service
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.common.by import By
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.common.keys import Keys
from selenium import webdriver
import time
# driver = webdriver.Chrome(service=Service(ChromeDriverManager().install()))
driver = webdriver.Chrome(service=Service(ChromeDriverManager().install()))

driver.maximize_window()

wait = WebDriverWait(driver, 60)
driver.get('http://localhost/AIP/meeting/alogin.php')

wait.until(EC.url_to_be('http://localhost/AIP/meeting/alogin.php'))
# sign_in=driver.find_element(By.ID, "rollnumber")
# sign_in.click()


el=WebDriverWait(driver, 20).until(EC.element_to_be_clickable((By.NAME, "adminUsername")))
# WebDriverWait(driver, 20).until(EC.element_to_be_clickable((By.XPATH, "/html/body/div/div[2]/div/form/div[2]/div[1]/div/div[1]/div[1]/div[1]"))).click()

action = webdriver.common.action_chains.ActionChains(driver)
action.move_to_element_with_offset(el, 5, 5)
action.click()
action.perform()
active_ele = driver.switch_to.active_element
# active_ele.send_keys(Keys.ENTER)
active_ele.send_keys("admin")

time.sleep(2)

pl=WebDriverWait(driver, 20).until(EC.element_to_be_clickable((By.NAME, "adminPassword")))
# WebDriverWait(driver, 20).until(EC.element_to_be_clickable((By.XPATH, "/html/body/div/div[2]/div/form/div[2]/div[2]/div/div[1]/div[1]"))).click()

action = webdriver.common.action_chains.ActionChains(driver)
action.move_to_element_with_offset(pl, 5, 5)
action.click()
action.perform()
active_ele = driver.switch_to.active_element
active_ele.send_keys("12345")
# active_ele.send_keys(Keys.ENTER)
time.sleep(2)
sign_in=driver.find_element(By.NAME, "adminLogin")
sign_in.click()
time.sleep(5)