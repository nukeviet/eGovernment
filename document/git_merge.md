# Các module đã trộn vào NukeViet EGOV
git remote add nukeviet https://github.com/nukeviet/nukeviet.git
git fetch nukeviet
git merge nukeviet/develop --allow-unrelated-histories

git remote add faq  https://github.com/nukeviet/module-faq
git fetch faq
git merge faq/qa --allow-unrelated-histories

git remote add videoclips  git@github.com:nukeviet/module-videoclips.git
git fetch videoclips
git merge videoclips/master --allow-unrelated-histories

git remote add laws  git@github.com:nukeviet/module-laws.git
git fetch laws
git merge laws/master --allow-unrelated-histories