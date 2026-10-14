const fs = require('fs');

const files = ['home.html', 'contact.html', 'booking_confirmation.html', 'shop.html', 'account.html'];
const configs = {};

for (const f of files) {
  const content = fs.readFileSync('Main/' + f, 'utf8');
  const idx = content.indexOf('tailwind.config=');
  const idxAlt = content.indexOf('tailwind.config =');
  const start = idx !== -1 ? idx + 'tailwind.config='.length : (idxAlt !== -1 ? idxAlt + 'tailwind.config ='.length : -1);
  if (start !== -1) {
    const end = content.indexOf(';</script>', start);
    if (end !== -1) {
      const code = content.substring(start, end).trim();
      try {
        configs[f] = new Function('return ' + code)();
      } catch (err) {
        console.error('Error parsing', f, err.message);
      }
    }
  }
}

for (const [f, cfg] of Object.entries(configs)) {
  console.log(f, 
    'colors:', Object.keys(cfg.theme?.extend?.colors || {}).length,
    'fontSize:', Object.keys(cfg.theme?.extend?.fontSize || {}).length,
    'fontFamily:', Object.keys(cfg.theme?.extend?.fontFamily || {}).length
  );
}
