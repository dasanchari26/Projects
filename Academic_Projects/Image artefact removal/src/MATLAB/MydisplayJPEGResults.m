function [ssim_original, ssim_model, psnr_original, psnr_model, niqe_original, niqe_model, brisque_original, brisque_model] = MydisplayJPEGResults(IOriginal,I5,I10,I15,I25,I35,I50,I5predicted,I10predicted,I15predicted,I25predicted,I35predicted,I50predicted)
% Compare SSIM values
ssimI5 = ssim(I5,IOriginal);
ssimI5predicted = ssim(I5predicted,IOriginal);
ssimI10 = ssim(I10,IOriginal);
ssimI10predicted = ssim(I10predicted,IOriginal);
ssimI15 = ssim(I15,IOriginal);
ssimI15predicted = ssim(I15predicted,IOriginal);
ssimI25 = ssim(I25,IOriginal);
ssimI25predicted = ssim(I25predicted,IOriginal);
ssimI35 = ssim(I35,IOriginal);
ssimI35predicted = ssim(I35predicted,IOriginal);
ssimI50 = ssim(I50,IOriginal);
ssimI50predicted = ssim(I50predicted,IOriginal);
% disp('------------------------------------------')
% disp('SSIM Comparison')
% disp('===============')
% disp(['I5: ' num2str(ssimI5) '    I5_predicted: ' num2str(ssimI5predicted)])
% disp(['I10: ' num2str(ssimI10) '    I10_predicted: ' num2str(ssimI10predicted)])
% disp(['I15: ' num2str(ssimI15) '    I15_predicted: ' num2str(ssimI15predicted)])
% disp(['I25: ' num2str(ssimI25) '    I25_predicted: ' num2str(ssimI25predicted)])
% disp(['I35: ' num2str(ssimI35) '    I35_predicted: ' num2str(ssimI35predicted)])
% disp(['I50: ' num2str(ssimI50) '    I50_predicted: ' num2str(ssimI50predicted)])
ssim_original = [ssimI5, ssimI10, ssimI15, ssimI25, ssimI35, ssimI50];
ssim_model = [ssimI5predicted, ssimI10predicted, ssimI15predicted, ssimI25predicted, ssimI35predicted, ssimI50predicted];

% Compare PSNR values
psnrI5 = psnr(I5,IOriginal);
psnrI5predicted = psnr(I5predicted,IOriginal);
psnrI10 = psnr(I10,IOriginal);
psnrI10predicted = psnr(I10predicted,IOriginal);
psnrI15 = psnr(I15,IOriginal);
psnrI15predicted = psnr(I15predicted,IOriginal);
psnrI25 = psnr(I25,IOriginal);
psnrI25predicted = psnr(I25predicted,IOriginal);
psnrI35 = psnr(I35,IOriginal);
psnrI35predicted = psnr(I35predicted,IOriginal);
psnrI50 = psnr(I50,IOriginal);
psnrI50predicted = psnr(I50predicted,IOriginal);

psnr_original = [psnrI5, psnrI10, psnrI15, psnrI25, psnrI35, psnrI50];
psnr_model = [psnrI5predicted, psnrI10predicted, psnrI15predicted, psnrI25predicted, psnrI35predicted, psnrI50predicted];

% disp('------------------------------------------')
% disp('PSNR Comparison')
% disp('===============')
% disp(['I5: ' num2str(psnrI5) '    I5_predicted: ' num2str(psnrI5predicted)])
% disp(['I10: ' num2str(psnrI10) '    I10_predicted: ' num2str(psnrI10predicted)])
% disp(['I15: ' num2str(psnrI15) '    I15_predicted: ' num2str(psnrI15predicted)])
% disp(['I25: ' num2str(psnrI25) '    I25_predicted: ' num2str(psnrI25predicted)])
% disp(['I35: ' num2str(psnrI35) '    I35_predicted: ' num2str(psnrI35predicted)])
% disp(['I50: ' num2str(psnrI50) '    I50_predicted: ' num2str(psnrI50predicted)])

% Compare NIQE values
niqeI5 = niqe(I5);
niqeI5predicted = niqe(I5predicted);
niqeI10 = niqe(I10);
niqeI10predicted = niqe(I10predicted);
niqeI15 = niqe(I15);
niqeI15predicted = niqe(I15predicted);
niqeI25 = niqe(I25);
niqeI25predicted = niqe(I25predicted);
niqeI35 = niqe(I35);
niqeI35predicted = niqe(I35predicted);
niqeI50 = niqe(I50);
niqeI50predicted = niqe(I50predicted);

niqe_original = [niqeI5, niqeI10, niqeI15, niqeI25, niqeI35, niqeI50];
niqe_model = [niqeI5predicted, niqeI10predicted, niqeI15predicted, niqeI25predicted, niqeI35predicted, niqeI50predicted];

% disp('------------------------------------------')
% disp('NIQE Comparison')
% disp('===============')
% disp(['I5: ' num2str(niqeI5) '    I5_predicted: ' num2str(niqeI5predicted)])
% disp(['I10: ' num2str(niqeI10) '    I10_predicted: ' num2str(niqeI10predicted)])
% disp(['I15: ' num2str(niqeI15) '    I15_predicted: ' num2str(niqeI15predicted)])
% disp(['I25: ' num2str(niqeI25) '    I25_predicted: ' num2str(niqeI25predicted)])
% disp(['I35: ' num2str(niqeI35) '    I35_predicted: ' num2str(niqeI35predicted)])
% disp(['I50: ' num2str(niqeI50) '    I50_predicted: ' num2str(niqeI50predicted)])
% disp('NOTE: Smaller NIQE score signifies better perceptual quality')

% Compare BRISQUE values
brisqueI5 = brisque(I5);
brisqueI5predicted = brisque(I5predicted);
brisqueI10 = brisque(I10);
brisqueI10predicted = brisque(I10predicted);
brisqueI15 = brisque(I15);
brisqueI15predicted = brisque(I15predicted);
brisqueI25 = brisque(I25);
brisqueI25predicted = brisque(I25predicted);
brisqueI35 = brisque(I35);
brisqueI35predicted = brisque(I35predicted);
brisqueI50 = brisque(I50);
brisqueI50predicted = brisque(I50predicted);

brisque_original = [brisqueI5, brisqueI10, brisqueI15, brisqueI25, brisqueI35, brisqueI50];
brisque_model = [brisqueI5predicted, brisqueI10predicted, brisqueI15predicted, brisqueI25predicted, brisqueI35predicted, brisqueI50predicted];

% disp('------------------------------------------')
% disp('BRISQUE Comparison')
% disp('==================')
% disp(['I5: ' num2str(brisqueI5) '    I5_predicted: ' num2str(brisqueI5predicted)])
% disp(['I10: ' num2str(brisqueI10) '    I10_predicted: ' num2str(brisqueI10predicted)])
% disp(['I15: ' num2str(brisqueI15) '    I15_predicted: ' num2str(brisqueI15predicted)])
% disp(['I25: ' num2str(brisqueI25) '    I25_predicted: ' num2str(brisqueI25predicted)])
% disp(['I35: ' num2str(brisqueI35) '    I35_predicted: ' num2str(brisqueI35predicted)])
% disp(['I50: ' num2str(brisqueI50) '    I50_predicted: ' num2str(brisqueI50predicted)])
% disp('NOTE: Smaller BRISQUE score signifies better perceptual quality')
end