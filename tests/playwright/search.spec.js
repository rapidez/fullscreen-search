import { test, expect } from '@playwright/test'
import { ProductPage } from '@rapidez/core/tests/playwright/pages/ProductPage.js'
import { BasePage } from '@rapidez/core/tests/playwright/pages/BasePage.js'

test('fullscreen-search', BasePage.tags, async ({ page }) => {
    const product = await new ProductPage(page).goto(process.env.PRODUCT_URL_SIMPLE)
    await page.goto('/')
    await page.getByTestId('autocomplete-input').click()
    await page.waitForLoadState('networkidle')
    await page.getByTestId('autocomplete-input-fullscreen').fill(product.name)
    await page.waitForLoadState('networkidle')
    await expect(page.getByTestId('autocomplete-item').first()).toContainText(product.name)
    await new BasePage(page).screenshot()
})